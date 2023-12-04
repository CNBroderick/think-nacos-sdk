<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance\ns;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\OkResultNacosResponse;

/**
 * 更新实例的健康状态
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->更新实例的健康状态
 */
class NacosDiscoveryInstanceUpdateHealthRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->更新实例的健康状态';

    protected string $uri = '/nacos/v2/ns/health/instance';
    protected string $method = 'PUT';
    protected bool $is_param_in_body = true;

    protected array $requireParams = [
        'serviceName' => '服务名',
        'ip' => 'IP地址',
        'port' => '端口号',
        'healthy' => '是否健康',
    ];
    protected array $optionalParams = [
        'namespaceId' => '命名空间Id，默认为public',
        'groupName' => '分组名',
        'clusterName' => '集群名，默认为DEFAULT',
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
        return new OkResultNacosResponse($response, $response_body);
    }

    /**
     * 命名空间Id，默认为public
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceUpdateHealthRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceUpdateHealthRequest
    {
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 集群名，默认为DEFAULT
     * @param string $clusterName
     * @return $this
     */
    public function paramClusterName(string $clusterName): NacosDiscoveryInstanceUpdateHealthRequest
    {
        self::param('clusterName', $clusterName);
        return $this;
    }
}