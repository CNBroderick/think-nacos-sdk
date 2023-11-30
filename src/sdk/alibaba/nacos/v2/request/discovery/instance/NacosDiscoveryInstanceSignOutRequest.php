<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\OkResultNacosResponse;

/**
 * 删除服务下的一个实例。
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->注销实例
 */
class NacosDiscoveryInstanceSignOutRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->注销实例';

    protected string $uri = '/nacos/v1/ns/instance';
    protected string $method = 'DELETE';

    protected array $requireParams = [
        'ip' => '服务实例IP',
        'port' => '服务实例port',
        'serviceName' => '服务名',
    ];
    protected array $optionalParams = [
        'groupName' => '分组名',
        'clusterName' => '集群名',
        'namespaceId' => '命名空间ID',
        'ephemeral' => '临时实例',
    ];

    /**
     * @param $serviceName
     * @param string $ip
     * @param int $port
     * @param array $params
     */
    public function __construct($serviceName, string $ip, int $port, array $params = [])
    {
        self::build_params(array_merge($params, [
            'serviceName' => $serviceName,
            'ip' => $ip,
            'port' => $port,
        ]));
    }

    public function request(array $addition_params = []): OkResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new OkResultNacosResponse($response_body, $response);
    }

    /**
     * 分组名
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceSignOutRequest{
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 集群名
     * @param string $clusterName
     * @return $this
     */
    public function paramClusterName(string $clusterName): NacosDiscoveryInstanceSignOutRequest
    {
        self::param('clusterName', $clusterName);
        return $this;
    }

    /**
     * 命名空间ID
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceSignOutRequest{
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 临时实例
     * @param bool $ephemeral
     * @return $this
     */
    public function paramEphemeral(bool $ephemeral): NacosDiscoveryInstanceSignOutRequest
    {
        self::param('ephemeral', $ephemeral);
        return $this;
    }

}