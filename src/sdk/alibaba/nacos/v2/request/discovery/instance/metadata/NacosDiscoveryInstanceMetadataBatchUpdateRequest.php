<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance\metadata;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\instance\matadata\NacosDiscoveryInstanceMetadataBatchResponse;

/**
 * 批量更新实例的元数据,
 * 对应元数据的键不存在时，则添加对应元数据
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance\metadata
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->批量更新实例元数据(Beta)
 */
class NacosDiscoveryInstanceMetadataBatchUpdateRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->批量更新实例元数据(Beta)';

    protected string $uri = '/nacos/v2/ns/instance/metadata/batch';
    protected string $method = 'PUT';

    protected array $requireParams = [
        'serviceName' => '服务名',
        'metadata' => '实例元数据',
    ];
    protected array $optionalParams = [
        'namespaceId' => '命名空间Id，默认为public',
        'groupName' => '分组名，默认为DEFAULT_GROUP',
        'consistencyType' => '实例的类型(ephemeral/persist)',
        'instances' => '需要更新的实例',
    ];
    protected bool $is_param_in_body = true;

    public function __construct(string $serviceName, array $metadata)
    {
        self::build_params([
            'serviceName' => $serviceName,
            'metadata' => json_encode($metadata),
        ]);
    }


    public function request(array $addition_params = []): NacosDiscoveryInstanceMetadataBatchResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoveryInstanceMetadataBatchResponse($response, $response_body);
    }

    /**
     * 命名空间Id，默认为public
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceMetadataBatchUpdateRequest{
        $this->params['namespaceId'] = $namespaceId;
        return $this;
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceMetadataBatchUpdateRequest
    {
        $this->params['groupName'] = $groupName;
        return $this;
    }

    /**
     * 实例的类型(ephemeral/persist)
     * 实例的持久化类型，当为‘persist’，表示对持久化实例的元数据进行更新；否则表示对临时实例的元数据进行更新
     * @param string $consistencyType
     * @return $this
     */
    public function paramConsistencyType(string $consistencyType): NacosDiscoveryInstanceMetadataBatchUpdateRequest{
        $this->params['consistencyType'] = $consistencyType;
        return $this;
    }

    /**
     * 待更新的实例列表，json数组，通过ip+port+ephemeral+cluster定位到某一实例，为空则表示更新指定服务下所有实例的元数据
     * @param array $instances
     * @return $this
     */
    public function paramInstances(array $instances): NacosDiscoveryInstanceMetadataBatchUpdateRequest
    {
        $this->params['instances'] = json_encode($instances);
        return $this;
    }
}