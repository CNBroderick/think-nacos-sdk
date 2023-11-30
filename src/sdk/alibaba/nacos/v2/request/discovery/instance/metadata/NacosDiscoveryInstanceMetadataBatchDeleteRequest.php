<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance\metadata;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\instance\matadata\NacosDiscoveryInstanceMetadataBatchResponse;

/**
 * 批量删除实例元数据(1.4起)
 * 注意：该接口为Beta接口，后续版本可能有所修改，甚至删除，请谨慎使用。
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance\metadata
 * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->批量删除实例元数据(Beta)
 */
class NacosDiscoveryInstanceMetadataBatchDeleteRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->批量更新实例元数据(Beta)';

    protected string $uri = '/nacos/v1/ns/instance/metadata/batch';
    protected string $method = 'DELETE';

    protected array $requireParams = [
        'serviceName' => '服务名(group@@serviceName)',
        'namespaceId' => '命名空间ID',
        'metadata' => '元数据信息',
    ];
    protected array $optionalParams = [
        'consistencyType' => '实例的类型(ephemeral/persist)',
        'instances' => '需要更新的实例',
    ];
    protected bool $is_param_in_body = true;

    public function __construct(string $serviceName, string $namespaceId, array $metadata)
    {
        self::build_params([
            'serviceName' => $serviceName,
            'namespaceId' => $namespaceId,
            'metadata' => json_encode($metadata),
        ]);
    }


    public function request(array $addition_params = []): NacosDiscoveryInstanceMetadataBatchResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoveryInstanceMetadataBatchResponse($response_body, $response);
    }

    /**
     * 实例的类型(ephemeral/persist)
     * @param string $consistencyType
     * @return $this
     */
    public function paramConsistencyType(string $consistencyType): NacosDiscoveryInstanceMetadataBatchDeleteRequest
    {
        self::param('consistencyType', $consistencyType);
        return $this;
    }

    /**
     * 需要更新的实例
     * @param string $instances
     * @return $this
     */
    public function paramInstances(string $instances): NacosDiscoveryInstanceMetadataBatchDeleteRequest
    {
        self::param('instances', $instances);
        return $this;
    }
}