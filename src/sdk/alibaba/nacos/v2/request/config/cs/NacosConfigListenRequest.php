<?php

namespace think\sdk\alibaba\nacos\v2\request\config\cs;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\StringNacosResponse;

/**
 * 监听 Nacos 上的配置，以便实时感知配置变更。如果配置变更，则用获取配置接口获取配置的最新值，动态刷新本地缓存。
 *
 * 注册监听采用的是异步 Servlet 技术。注册监听本质就是带着配置和配置值的 MD5 值和后台对比。如果 MD5 值不一致，就立即返回不一致的配置。如果值一致，就等待住 30 秒。返回值为空。
 * @package think\sdk\alibaba\nacos\v2\request\config\cs
 * @see https://nacos.io/zh-cn/docs/open-api.html 配置管理->监听配置
 */
class NacosConfigListenRequest extends AbstractNacosRequest
{
    protected string $requestName = '配置管理->监听配置';
    protected string $uri = '/nacos/v1/cs/configs/listener';
    protected string $method = 'POST';
    protected bool $is_param_in_body = true;

    protected array $requireParams = [
        'Listening-Configs' => '监听数据报文',
    ];

    protected array $headers = [
        'Long-Pulling-Timeout' => '30000',
    ];

    private array $listenConfigs = [];

    /**
     * @param string $dataId 配置 ID
     * @param string $group 配置分组
     * @param string $contentMD5 配置内容 MD5 值
     * @param string $namespace 租户信息，对应 Nacos 的命名空间字段(非必填)
     * @return $this
     */
    public function with(string $dataId, string $group, string $contentMD5 = '', string $namespace = ''): NacosConfigListenRequest
    {
        $this->listenConfigs[] = implode(chr(2), [
            'dataId' => $dataId,
            'group' => $group,
            'contentMD5' => $contentMD5,
            'tenant' => $namespace,
        ]);
        return $this;
    }

    /**
     * 设置长轮询超时时间
     * @param int $timeout 单位：毫秒
     * @return NacosConfigListenRequest
     */
    public function longPullingTimeout(int $timeout = 30000): NacosConfigListenRequest
    {
        if ($timeout < 1) $timeout = 30000;
        $this->headers['Long-Pulling-Timeout'] = $timeout;
        return $this;
    }

    public function build(): NacosConfigListenRequest
    {
        self::build_params([
            'Listening-Configs' => implode(chr(1), $this->listenConfigs),
        ]);
        return $this;
    }

    public function request(array $addition_params = []): StringNacosResponse
    {
        list($response, $body) = $this->doRequest($addition_params);
        return new StringNacosResponse($response, $body);
    }

}