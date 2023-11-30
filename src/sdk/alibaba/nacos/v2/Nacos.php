<?php

namespace think\sdk\alibaba\nacos\v2;

use think\sdk\alibaba\nacos\v2\auth\NacosTokenManager;
use think\sdk\alibaba\nacos\v2\config\NacosConfig;
use think\sdk\alibaba\nacos\v2\request\config\cs\NacosConfigListenRequest;
use think\sdk\alibaba\nacos\v2\request\discovery\instance\NacosDiscoveryInstanceBeatRequest;
use think\sdk\alibaba\nacos\v2\request\discovery\instance\NacosDiscoveryInstanceModifyRequest;
use think\sdk\alibaba\nacos\v2\request\discovery\instance\NacosDiscoveryInstanceRegistrationRequest;
use think\sdk\alibaba\nacos\v2\request\discovery\instance\NacosDiscoveryInstanceSignOutRequest;

class Nacos
{
    private NacosConfig $config;
    private NacosTokenManager $tokenManager;

    private string $server_ip;
    private string $server_port;

    public function __construct()
    {
        $this->config = NacosConfig::getInstance();
    }

    public function init(): Nacos
    {
        if ($this->getConfig()->isEnableAuth()) {
            $this->tokenManager = NacosTokenManager::getInstance();
        }

        return $this;
    }

    /**
     * @param string $server_ip 服务当前IP地址，不能填写如127.x.x.x、localhost、:::的本机地址
     * @param int $server_port 服务当前端口
     * @param array $params 扩展参数
     * @return void
     * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->注册实例
     */
    public function register(string $server_ip, int $server_port, array $params = []): Nacos
    {
        $this->server_ip = $server_ip;
        $this->server_port = $server_port;
        $config = $this->getConfig();
        (new NacosDiscoveryInstanceRegistrationRequest(
            $config->getName(),
            $server_ip,
            $server_port,
            $params
        ))->request()->requireSuccess();
        return $this;
    }

    /**
     * @param callable $configChangeCallback 配置变更回调函数
     * @param int $longPullingTimeout 长轮询超时时间，单位毫秒
     * @return callable 取消监听回调函数
     */
    public function listen(
        callable $configChangeCallback,
        int      $longPullingTimeout = 30000
    )
    {
        $loop = true;
        $contentMD5 = '';
        while ($loop) {
            $response = (new NacosConfigListenRequest())
                ->with(
                    $this->config->getDataId(),
                    $this->config->getGroup(),
                    $contentMD5,
                    $this->config->getNamespace()
                )
                ->build()
                ->longPullingTimeout($longPullingTimeout)
                ->request();
            $config = $response->getData();
            if ($config) {
                $contentMD5 = md5($config);
                if (is_callable($configChangeCallback)) {
                    $configChangeCallback($config);
                }
            }

            (new NacosDiscoveryInstanceBeatRequest(
                $this->config->getName(),
                $this->server_ip,
                $this->server_port,
            ))->request();
        }

        return function () use (&$loop) {
            $loop = false;
        };
    }

    /**
     * @param array $params 扩展参数
     * @return void
     * @see https://nacos.io/zh-cn/docs/open-api.html#2.2 服务发现->注销实例
     */
    public function sign_out(array $params = []): void
    {
        $config = $this->getConfig();
        (new NacosDiscoveryInstanceSignOutRequest(
            $config->getName(),
            $this->server_ip,
            $this->server_port,
            $params
        ))->request();
    }

    /**
     * @param string $server_ip 服务当前IP地址，不能填写如127.x.x.x、localhost、:::的本机地址
     * @param int $server_port 服务当前端口
     * @param array $params 扩展参数
     * @return response\common\OkResultNacosResponse
     * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->修改实例
     */
    public function modify_instance(string $server_ip, int $server_port, array $params = []): response\common\OkResultNacosResponse
    {
        $config = $this->getConfig();
        return (new NacosDiscoveryInstanceModifyRequest(
            $config->getName(),
            $server_ip,
            $server_port,
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
}