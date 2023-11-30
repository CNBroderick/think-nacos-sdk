<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\instance\NacosDiscoveryInstanceListQueryResponse;

/**
 * 查询服务下的实例列表
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->查询实例列表
 */
class NacosDiscoveryInstanceListQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->修改实例';
    protected string $uri = '/nacos/v1/ns/instance/list';
    protected string $method = 'GET';
    

    protected array $requireParams = [
        'serviceName' => '服务名',
    ];
    protected array $optionalParams = [
        'groupName' => '分组名',
        'namespaceId' => '命名空间ID',
        'clusters' => '集群名称，多个集群用逗号分隔',
        'healthyOnly' => '是否只返回健康实例',
    ];

    /**
     * @param $serviceName
     */
    public function __construct($serviceName)
    {
        self::build_params([
            'serviceName' => $serviceName,
        ]);
    }

    public function request(array $addition_params = []): NacosDiscoveryInstanceListQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoveryInstanceListQueryResponse($response_body, $response);
    }

    /**
     * 分组名
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceListQueryRequest{
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 命名空间ID
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceListQueryRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 集群名称，多个集群用逗号分隔
     * @param string $clusters
     * @return $this
     */
    public function paramClusters(string $clusters): NacosDiscoveryInstanceListQueryRequest {
        self::param('clusters', $clusters);
        return $this;
    }

    /**
     * 是否只返回健康实例
     * @param bool $healthyOnly
     * @return $this
     */
    public function paramHealthyOnly(bool $healthyOnly): NacosDiscoveryInstanceListQueryRequest
    {
        self::param('healthyOnly', $healthyOnly);
        return $this;
    }
}