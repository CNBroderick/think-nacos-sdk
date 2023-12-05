<?php

namespace think\sdk\alibaba\nacos\v2;

use Composer\InstalledVersions;
use think\facade\Event;
use think\facade\Log;
use think\sdk\alibaba\nacos\v2\auth\NacosTokenManager;
use think\sdk\alibaba\nacos\v2\config\NacosConfig;
use think\sdk\alibaba\nacos\v2\event\NacosConfigChangeEvent;
use think\sdk\alibaba\nacos\v2\request\config\cs\NacosConfigQueryRequest;
use think\sdk\alibaba\nacos\v2\request\discovery\instance\ns\NacosDiscoveryInstanceBeatRequest;
use think\sdk\alibaba\nacos\v2\request\discovery\instance\ns\NacosDiscoveryInstanceDeleteRequest;
use think\sdk\alibaba\nacos\v2\request\discovery\instance\ns\NacosDiscoveryInstanceModifyRequest;
use think\sdk\alibaba\nacos\v2\request\discovery\instance\ns\NacosDiscoveryInstanceRegistrationRequest;
use think\sdk\alibaba\nacos\v2\request\discovery\instance\ns\NacosDiscoveryInstanceUpdateHealthRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

class Nacos
{

    private NacosConfig $config;
    private NacosTokenManager $tokenManager;

    private bool $listening = false;

    /**
     * @param NacosConfig|null $config Nacos配置，如需额外配置可使用NacosConfig::getInstance()获取
     * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->注册实例
     */
    public function __construct($config = null)
    {
        $this->config = $config ?: NacosConfig::getInstance();
        $this->tokenManager = NacosTokenManager::getInstance();
    }

    public function register(): Nacos
    {
        if (!$this->getServerIp() || !$this->getServerPort()) {
            return $this;
        }
        $config = $this->getConfig();
        (new NacosDiscoveryInstanceRegistrationRequest(
            $config->getName(),
            $this->getServerIp(),
            $this->getServerPort(),
            $this->getServerParams()
        ))->request()->requireSuccess();
        Log::info('已将' . $this->getServerIp() . ':' . $this->getServerPort() . '注册到Nacos。');
        return $this;
    }

    /**
     * 在应用初始化时自动注册
     * 添加值：
     * ```
     * 'AppInit'  => [
     *      'think\sdk\alibaba\nacos\v2\Nacos',
     * ],
     * ```
     * @see https://doc.thinkphp.cn/v8_0/event.html 添加方法
     */
    public function handle($event): void
    {
        $this->register();
    }

    public function loadNacosConfig(): string
    {
        $config_string_raw = (new NacosConfigQueryRequest(
            $this->config->getDataId(),
            $this->config->getGroup())
        )
            ->paramNamespaceId($this->config->getNamespace())
            ->request()
            ->getData();
        if ($config_string_raw == 'config data not exist') return '';
        return $config_string_raw;
    }

    public function beat(string $beat = '{}'): bool
    {
        return (new NacosDiscoveryInstanceBeatRequest(
            $this->config->getName(),
            $this->getServerIp(),
            $this->getServerPort(),
            $beat,
        ))
            ->paramNamespaceId($this->config->getNamespace())
            ->paramGroupName($this->config->getGroup())
            ->request()
            ->isSuccess();
    }

    public function healthy(bool $healthy = true): bool
    {
        return (new NacosDiscoveryInstanceUpdateHealthRequest(
            $this->config->getName(),
            $this->getServerIp(),
            $this->getServerPort(),
            $healthy,
        ))
            ->paramNamespaceId($this->config->getNamespace())
            ->paramGroupName($this->config->getGroup())
            ->request()
            ->isSuccess();
    }

    /**
     * 开始监听配置变更，
     * 如需获取配置变更，请监听nacosConfigChange事件，如：
     *  ```
     *  Event::listen(\think\sdk\alibaba\nacos\v2\event\NacosConfigChangeEvent::class, function ($config) {
     *      Log::debug('think-nacos-sdk: nacosConfigChange event. config=' . "\n" . $config);
     *  }
     *  ```
     * 如需停止监听，请使用 $nacos -> cancelListening();
     * @return $this
     */
    public function listen(): Nacos
    {
        $this->listening = true;
        $contentMD5 = '';
        while ($this->listening) {
            try {
                Log::debug('think-nacos-sdk: listen config.');
                $config = $this->loadNacosConfig();
                if ($config) {
                    $new_contentMD5 = md5($config);
                    if ($new_contentMD5 != $contentMD5) {
                        Log::debug('think-nacos-sdk: config changed. md5=' . $new_contentMD5 . ' config=' . "\n" . $config);
                        $contentMD5 = $new_contentMD5;
                        Event::trigger(NacosConfigChangeEvent::class, $config);
                    }
                }
                if ($this->beat()) {
                    Log::debug('think-nacos-sdk: beat success.');
                } else {
                    Log::debug('think-nacos-sdk: beat failed.');
                }
                sleep(1);
            } catch (\Exception $exception) {
                Log::error('think-nacos-sdk: listen error: ' . $exception->getMessage());
            }
        }
        return $this;
    }

    /**
     * @param array $params 扩展参数
     * @return void
     * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html#2.2 服务发现->注销实例
     */
    public function signOut(array $params = []): void
    {
        $config = $this->getConfig();
        (new NacosDiscoveryInstanceDeleteRequest(
            $config->getName(),
            $this->getServerIp(),
            $this->getServerPort(),
            $params
        ))->request();
    }

    /**
     * @param array $params 扩展参数
     * @return BoolResultNacosResponse
     * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->修改实例
     */
    public function modify_instance(array $params): BoolResultNacosResponse
    {
        $config = $this->getConfig();
        return (new NacosDiscoveryInstanceModifyRequest(
            $config->getName(),
            $this->getServerIp(),
            $this->getServerPort(),
        ))->params($params, true)->request();
    }

    public function getConfig(): NacosConfig
    {
        return $this->config;
    }

    public function getTokenManager(): NacosTokenManager
    {
        return $this->tokenManager;
    }

    public function getServerIp(): string
    {
        return $this->config->getServerIp();
    }

    public function getServerPort(): string
    {
        return $this->config->getServerPort();
    }

    public function getServerParams(): array
    {
        return $this->config->getServerParams();
    }

    /**
     * @param bool $listening 是否监听配置变更
     * @return $this
     */
    public function cancelListening(bool $listening): Nacos
    {
        $this->listening = $listening;
        return $this;
    }

    public static function getVersion(): string
    {
        return InstalledVersions::getPrettyVersion('topthink/think-nacos-sdk') ?: '0.0.1';
    }

    public static function getClientVersions()
    {
        $userAgentParts = [
            'PHP/' . phpversion(),                      // PHP 版本（另一种格式）
            'ThinkPHP/' . \think\facade\App::version(), // ThinkPHP版本
            'think-nacos-sdk/' . self::getVersion(),    // NacosSDK版本
        ];
        return implode(' ', $userAgentParts);
    }

    public static function getUserAgent()
    {
        $userAgentParts = [
            'Mozilla/5.0',                              // 基础 User-Agent
            '(' . php_uname('s') . ';',           // 操作系统
            php_uname('m') . ';',                 // 机器类型（如 x86_64）
            'rv:' . phpversion() . ')',                 // PHP 版本
            'PHP/' . phpversion(),                      // PHP 版本（另一种格式）
            'ThinkPHP/' . \think\facade\App::version(), // ThinkPHP版本
            'think-nacos-sdk/' . self::getVersion(),    // NacosSDK版本
        ];
        return implode(' ', $userAgentParts);
    }
}