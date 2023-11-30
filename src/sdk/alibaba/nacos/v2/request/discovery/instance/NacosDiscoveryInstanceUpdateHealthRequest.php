<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\OkResultNacosResponse;

/**
 * 更新实例的健康状态,仅在集群的健康检查关闭时才生效,当集群配置了健康检查时,该接口会返回错误
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->更新实例的健康状态
 */
class NacosDiscoveryInstanceUpdateHealthRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->更新实例的健康状态';

    protected string $uri = '/nacos/v1/ns/health/instance';
    protected string $method = 'PUT';

    protected array $requireParams = [
        'ip' => '服务实例IP',
        'port' => '服务实例port',
        'serviceName' => '服务名',
        'healthy' => '是否健康',
    ];
    protected array $optionalParams = [
        'namespaceId' => '命名空间ID',
        'serviceName' => '服务名',
        'groupName' => '分组名',
        'clusterName' => '集群名',
    ];

    public function __construct($serviceName, string $ip, int $port, bool $healthy)
    {
        self::build_params([
            'serviceName' => $serviceName,
            'ip' => $ip,
            'port' => $port,
            'healthy' => $healthy,
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
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceUpdateHealthRequest{
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 分组名
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceUpdateHealthRequest
    {
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 集群名
     * @param string $clusterName
     * @return $this
     */
    public function paramClusterName(string $clusterName): NacosDiscoveryInstanceUpdateHealthRequest{
        self::param('clusterName', $clusterName);
        return $this;
    }
}