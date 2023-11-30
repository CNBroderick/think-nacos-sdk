<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\OkResultNacosResponse;

/**
 * 发送某个实例的心跳
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->注册实例
 */
class NacosDiscoveryInstanceBeatRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->发送实例心跳';

    protected string $uri = '/nacos/v1/ns/instance/beat';
    protected string $method = 'PUT';

    protected array $requireParams = [
        'ip' => '服务实例IP',
        'port' => '服务实例port',
        'serviceName' => '服务名',
        'beat' => '实例心跳内容',
    ];
    protected array $optionalParams = [
        'namespaceId' => '命名空间ID',
        'weight' => '权重',
        'enabled' => '上线',
        'healthy' => '健康',
        'metadata' => '扩展信息',
        'clusterName' => '集群名',
        'groupName' => '分组名',
        'ephemeral' => '临时实例',
    ];

    /**
     * @param $serviceName
     * @param string $ip
     * @param int $port
     * @param array $beat
     */
    public function __construct($serviceName, string $ip, int $port, array $beat = [])
    {
        self::build_params([
            'serviceName' => $serviceName,
            'ip' => $ip,
            'port' => $port,
            'beat' => json_encode($beat),
        ]);
    }

    public function request(array $addition_params = []): OkResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new OkResultNacosResponse($response_body, $response);
    }

    /**
     * 命名空间ID
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceBeatRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 权重
     * @param int $weight
     * @return $this
     */
    public function paramWeight(int $weight): NacosDiscoveryInstanceBeatRequest
    {
        self::param('weight', $weight);
        return $this;
    }

    /**
     * 上线
     * @param bool $enabled
     * @return $this
     */
    public function paramEnabled(bool $enabled): NacosDiscoveryInstanceBeatRequest
    {
        self::param('enabled', $enabled);
        return $this;
    }

    /**
     * 健康
     * @param bool $healthy
     * @return $this
     */
    public function paramHealthy(bool $healthy): NacosDiscoveryInstanceBeatRequest
    {
        self::param('healthy', $healthy);
        return $this;
    }

    /**
     * 扩展信息
     * @param string $metadata
     * @return $this
     */
    public function paramMetadata(string $metadata): NacosDiscoveryInstanceBeatRequest
    {
        self::param('metadata', $metadata);
        return $this;
    }

    /**
     * 集群名
     * @param string $clusterName
     * @return $this
     */
    public function paramClusterName(string $clusterName): NacosDiscoveryInstanceBeatRequest
    {
        self::param('clusterName', $clusterName);
        return $this;
    }

    /**
     * 分组名
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceBeatRequest
    {
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 临时实例
     * @param bool $ephemeral
     * @return $this
     */
    public function paramEphemeral(bool $ephemeral): NacosDiscoveryInstanceBeatRequest
    {
        self::param('ephemeral', $ephemeral);
        return $this;
    }
}