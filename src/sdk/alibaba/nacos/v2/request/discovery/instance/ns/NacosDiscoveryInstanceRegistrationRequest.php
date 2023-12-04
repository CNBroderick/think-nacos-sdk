<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance\ns;

use think\sdk\alibaba\nacos\v2\config\NacosConfig;
use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 注册一个实例到服务。
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->注册实例
 */
class NacosDiscoveryInstanceRegistrationRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->注册实例';

    protected string $uri = '/nacos/v2/ns/instance';
    protected string $method = 'POST';
    protected bool $is_param_in_body = true;

    protected array $requireParams = [
        'ip' => '服务实例IP',
        'port' => '服务实例port',
        'serviceName' => '服务名',
    ];
    protected array $optionalParams = [
        'namespaceId' => '命名空间ID',
        'weight' => '权重',
        'enabled' => '是否可用，默认为true',
        'healthy' => '是否只查找健康实例，默认为true',
        'metadata' => '	实例元数据',
        'clusterName' => '集群名',
        'groupName' => '分组名，默认为DEFAULT_GROUP',
        'ephemeral' => '是否为临时实例',
    ];

    /**
     * @param $serviceName
     * @param string $ip
     * @param int $port
     * @param array $params
     */
    public function __construct($serviceName, string $ip, int $port, array $params = [])
    {
        $config = NacosConfig::getInstance();
        self::build_params(array_merge(
            [
                'namespaceId' => $config->getNamespace(),
                'enabled' => $config->isEnable(),
                'healthy' => true,
                'ephemeral' => false,
                'groupName' => $config->getGroup(),
                'metadata' => [
                    'preserved.register.source' => 'ThinkPHP/8.0.3 think-nacos-sdk/0.0.1'
                ],
            ],
            $params,
            [
                'serviceName' => $serviceName,
                'ip' => $ip,
                'port' => $port,
            ]
        ));
    }

    public function request(array $addition_params = []): BoolResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new BoolResultNacosResponse($response, $response_body);
    }

    /**
     * 命名空间ID
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceRegistrationRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 权重
     * @param float $weight
     * @return $this
     */
    public function paramWeight(float $weight): NacosDiscoveryInstanceRegistrationRequest
    {
        self::param('weight', $weight);
        return $this;
    }

    /**
     * 是否可用，默认为true
     * @param bool $enabled
     * @return $this
     */
    public function paramEnabled(bool $enabled): NacosDiscoveryInstanceRegistrationRequest
    {
        self::param('enabled', $enabled);
        return $this;
    }

    /**
     * 是否只查找健康实例，默认为true
     * @param bool $healthy
     * @return $this
     */
    public function paramHealthy(bool $healthy): NacosDiscoveryInstanceRegistrationRequest
    {
        self::param('healthy', $healthy);
        return $this;
    }

    /**
     * 实例元数据
     * @param string $metadata JSON格式String
     * @return $this
     */
    public function paramMetadata(string $metadata): NacosDiscoveryInstanceRegistrationRequest
    {
        self::param('metadata', $metadata);
        return $this;
    }

    /**
     * 集群名
     * @param string $clusterName
     * @return $this
     */
    public function paramClusterName(string $clusterName): NacosDiscoveryInstanceRegistrationRequest
    {
        self::param('clusterName', $clusterName);
        return $this;
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceRegistrationRequest
    {
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 是否为临时实例
     * @param bool $ephemeral
     * @return $this
     */
    public function paramEphemeral(bool $ephemeral): NacosDiscoveryInstanceRegistrationRequest
    {
        self::param('ephemeral', $ephemeral);
        return $this;
    }
}