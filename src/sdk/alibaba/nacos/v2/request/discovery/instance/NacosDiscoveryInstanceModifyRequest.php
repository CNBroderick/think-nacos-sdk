<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\OkResultNacosResponse;

/**
 * 修改服务下的一个实例。
 *
 * 注意：在Nacos2.0版本后，通过该接口更新的元数据拥有更高的优先级，且具有记忆能力；会在对应实例删除后，依旧存在一段时间，如果在此期间实例重新注册，该元数据依旧生效；您可以通过nacos.naming.clean.expired-metadata.expired-time及nacos.naming.clean.expired-metadata.interval对记忆时间进行修改
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->修改实例
 */
class NacosDiscoveryInstanceModifyRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->修改实例';

    protected string $uri = '/nacos/v1/ns/instance';
    protected string $method = 'PUT';

    protected array $requireParams = [
        'serviceName' => '服务名',
        'ip' => '服务实例IP',
        'port' => '服务实例port',
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
     */
    public function __construct($serviceName, string $ip, int $port)
    {
        self::build_params([
            'serviceName' => $serviceName,
            'ip' => $ip,
            'port' => $port,
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
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceModifyRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 权重
     * @param int $weight
     * @return $this
     */
    public function paramWeight(int $weight): NacosDiscoveryInstanceModifyRequest
    {
        self::param('weight', $weight);
        return $this;
    }

    /**
     * 上线
     * @param bool $enabled
     * @return $this
     */
    public function paramEnabled(bool $enabled): NacosDiscoveryInstanceModifyRequest
    {
        self::param('enabled', $enabled);
        return $this;
    }

    /**
     * 健康
     * @param bool $healthy
     * @return $this
     */
    public function paramHealthy(bool $healthy): NacosDiscoveryInstanceModifyRequest
    {
        self::param('healthy', $healthy);
        return $this;
    }

    /**
     * 扩展信息
     * @param string $metadata
     * @return $this
     */
    public function paramMetadata(string $metadata): NacosDiscoveryInstanceModifyRequest
    {
        self::param('metadata', $metadata);
        return $this;
    }

    /**
     * 集群名
     * @param string $clusterName
     * @return $this
     */
    public function paramClusterName(string $clusterName): NacosDiscoveryInstanceModifyRequest
    {
        self::param('clusterName', $clusterName);
        return $this;
    }

    /**
     * 分组名
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceModifyRequest
    {
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 临时实例
     * @param bool $ephemeral
     * @return $this
     */
    public function paramEphemeral(bool $ephemeral): NacosDiscoveryInstanceModifyRequest
    {
        self::param('ephemeral', $ephemeral);
        return $this;
    }
}