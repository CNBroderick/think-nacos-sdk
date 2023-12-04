<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance\ns;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 删除服务下的一个实例。
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->注销实例
 */
class NacosDiscoveryInstanceDeleteRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->注销实例';

    protected string $uri = '/nacos/v2/ns/instance';
    protected string $method = 'DELETE';
    protected bool $is_param_in_body = true;

    protected array $requireParams = [
        'ip' => '服务实例IP',
        'port' => '服务实例port',
        'serviceName' => '服务名',
    ];
    protected array $optionalParams = [
        'namespaceId' => '命名空间Id，默认为public',
        'groupName' => '分组名，默认为DEFAULT_GROUP',
        'clusterName' => '集群名称，默认为DEFAULT',
        'healthy' => '是否只查找健康实例，默认为true',
        'weight' => '实例权重，默认为1.0',
        'enabled' => '是否可用，默认为true',
        'metadata' => '实例元数据',
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
        self::build_params(array_merge($params, [
            'serviceName' => $serviceName,
            'ip' => $ip,
            'port' => $port,
        ]));
    }

    public function request(array $addition_params = []): BoolResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new BoolResultNacosResponse($response, $response_body);
    }

    /**
     * 命名空间Id，默认为public
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceDeleteRequest{
        $this->params['namespaceId'] = $namespaceId;
        return $this;
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceDeleteRequest
    {
        $this->params['groupName'] = $groupName;
        return $this;
    }

    /**
     * 集群名称，默认为DEFAULT
     * @param string $clusterName
     * @return $this
     */
    public function paramClusterName(string $clusterName): NacosDiscoveryInstanceDeleteRequest{
        $this->params['clusterName'] = $clusterName;
        return $this;
    }

    /**
     * 是否只查找健康实例，默认为true
     * @param bool $healthy
     * @return $this
     */
    public function paramHealthy(bool $healthy): NacosDiscoveryInstanceDeleteRequest
    {
        $this->params['healthy'] = $healthy;
        return $this;
    }

    /**
     * 实例权重，默认为1.0
     * @param float $weight
     * @return $this
     */
    public function paramWeight(float $weight): NacosDiscoveryInstanceDeleteRequest{
        $this->params['weight'] = $weight;
        return $this;
    }

    /**
     * 是否可用，默认为true
     * @param bool $enabled
     * @return $this
     */
    public function paramEnabled(bool $enabled): NacosDiscoveryInstanceDeleteRequest
    {
        $this->params['enabled'] = $enabled;
        return $this;
    }

    /**
     * 实例元数据
     * @param string $metadata JSON格式String
     * @return $this
     */
    public function paramMetadata(string $metadata): NacosDiscoveryInstanceDeleteRequest
    {
        $this->params['metadata'] = $metadata;
        return $this;
    }

    /**
     * 是否为临时实例
     * @param bool $ephemeral
     * @return $this
     */
    public function paramEphemeral(bool $ephemeral): NacosDiscoveryInstanceDeleteRequest{
        $this->params['ephemeral'] = $ephemeral;
        return $this;
    }
}