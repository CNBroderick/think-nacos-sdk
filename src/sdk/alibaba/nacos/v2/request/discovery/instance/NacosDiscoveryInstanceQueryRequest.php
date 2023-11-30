<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\instance\NacosDiscoveryInstanceQueryResponse;

/**
 * 查询一个服务下个某个实例详情。
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->查询实例详情
 */
class NacosDiscoveryInstanceQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->修改实例';
    protected string $uri = '/nacos/v1/ns/instance';
    protected string $method = 'GET';
    

    protected array $requireParams = [
        'serviceName' => '服务名',
        'ip' => '服务实例IP',
        'port' => '服务实例port',
    ];
    protected array $optionalParams = [
        'groupName' => '分组名',
        'namespaceId' => '命名空间ID',
        'cluster' => '集群名称',
        'healthyOnly' => '是否只返回健康实例',
        'ephemeral' => '是否临时实例',
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

    public function request(array $addition_params = []): NacosDiscoveryInstanceQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoveryInstanceQueryResponse($response_body, $response);
    }

    /**
     * 分组名
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceQueryRequest
    {
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 命名空间ID
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceQueryRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 集群名称
     * @param string $cluster
     * @return $this
     */
    public function paramCluster(string $cluster): NacosDiscoveryInstanceQueryRequest
    {
        self::param('cluster', $cluster);
        return $this;
    }

    /**
     * 是否只返回健康实例
     * @param bool $healthyOnly
     * @return $this
     */
    public function paramHealthyOnly(bool $healthyOnly): NacosDiscoveryInstanceQueryRequest
    {
        self::param('healthyOnly', $healthyOnly);
        return $this;
    }

    /**
     * 是否临时实例
     * @param bool $ephemeral
     * @return $this
     */
    public function paramEphemeral(bool $ephemeral): NacosDiscoveryInstanceQueryRequest
    {
        self::param('ephemeral', $ephemeral);
        return $this;
    }
}