<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance\ns;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 修改实例信息
 *
 * 通过该接口更新的元数据拥有更高的优先级，且具有记忆能力；会在对应实例删除后，依旧存在一段时间，如果在此期间实例重新注册，该元数据依旧生效；您可以通过nacos.naming.clean.expired-metadata.expired-time及nacos.naming.clean.expired-metadata.interval对记忆时间进行修改
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->更新实例
 */
class NacosDiscoveryInstanceModifyRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->修改实例';

    protected string $uri = '/nacos/v2/ns/instance';
    protected string $method = 'PUT';
    protected bool $is_param_in_body = true;

    protected array $requireParams = [
        'serviceName' => '服务名',
        'ip' => '服务实例IP',
        'port' => '服务实例port',
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
     */
    public function __construct($serviceName, string $ip, int $port)
    {
        self::build_params([
            'serviceName' => $serviceName,
            'ip' => $ip,
            'port' => $port,
        ]);
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
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceModifyRequest
    {
        $this->params['namespaceId'] = $namespaceId;
        return $this;
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceModifyRequest{
        $this->params['groupName'] = $groupName;
        return $this;
    }

    /**
     * 集群名称，默认为DEFAULT
     * @param string $clusterName
     * @return $this
     */
    public function paramClusterName(string $clusterName): NacosDiscoveryInstanceModifyRequest
    {
        $this->params['clusterName'] = $clusterName;
        return $this;
    }

    /**
     * 是否只查找健康实例，默认为true
     * @param bool $healthy
     * @return $this
     */
    public function paramHealthy(bool $healthy): NacosDiscoveryInstanceModifyRequest{
        $this->params['healthy'] = $healthy;
        return $this;
    }

    /**
     * 实例权重，默认为1.0
     * @param float $weight
     * @return $this
     */
    public function paramWeight(float $weight): NacosDiscoveryInstanceModifyRequest
    {
        $this->params['weight'] = $weight;
        return $this;
    }

    /**
     * 是否可用，默认为true
     * @param bool $enabled
     * @return $this
     */
    public function paramEnabled(bool $enabled): NacosDiscoveryInstanceModifyRequest{
        $this->params['enabled'] = $enabled;
        return $this;
    }

    /**
     * 实例元数据
     * @param string $metadata JSON格式String
     * @return $this
     */
    public function paramMetadata(string $metadata): NacosDiscoveryInstanceModifyRequest{
        $this->params['metadata'] = $metadata;
        return $this;
    }

    /**
     * 是否为临时实例
     * @param bool $ephemeral
     * @return $this
     */
    public function paramEphemeral(bool $ephemeral): NacosDiscoveryInstanceModifyRequest
    {
        $this->params['ephemeral'] = $ephemeral;
        return $this;
    }
}