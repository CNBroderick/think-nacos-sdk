<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance\ns;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\instance\NacosDiscoveryInstanceQueryResponse;

/**
 * 查询一个服务下个某个实例详情。
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查询实例详情
 */
class NacosDiscoveryInstanceQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->修改实例';
    protected string $uri = '/nacos/v2/ns/instance';
    protected string $method = 'GET';
    

    protected array $requireParams = [
        'serviceName' => '服务名',
        'ip' => '服务实例IP',
        'port' => '服务实例port',
    ];
    protected array $optionalParams = [
        'groupName' => '分组名，默认为DEFAULT_GROUP',
        'namespaceId' => '命名空间Id，默认为public',
        'cluster' => '集群名称，默认为DEFAULT',
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
        return new NacosDiscoveryInstanceQueryResponse($response, $response_body);
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceQueryRequest
    {
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 命名空间Id，默认为public
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceQueryRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 集群名
     * @param string $cluster
     * @return $this
     */
    public function paramCluster(string $cluster): NacosDiscoveryInstanceQueryRequest
    {
        self::param('cluster', $cluster);
        return $this;
    }

}