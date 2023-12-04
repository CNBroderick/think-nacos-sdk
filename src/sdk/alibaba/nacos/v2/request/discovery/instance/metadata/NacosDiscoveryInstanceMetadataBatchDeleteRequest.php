<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance\metadata;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 批量删除实例的元数据,
 *
 * 对应元数据的键不存在时，则不做操作
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance\metadata
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->批量删除实例元数据(Beta)
 */
class NacosDiscoveryInstanceMetadataBatchDeleteRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->批量删除实例元数据';

    protected string $uri = '/nacos/v2/ns/instance/metadata/batch';
    protected string $method = 'DELETE';

    protected array $requireParams = [
        'serviceName' => '服务名',
        'metadata' => '实例元数据',
    ];
    protected array $optionalParams = [
        'namespaceId' => '命名空间Id，默认为public',
        'groupName' => '分组名，默认为DEFAULT_GROUP',
        'consistencyType' => '持久化类型，默认为空',
        'instances' => '需要更新的实例列表，默认为空',
    ];
    protected bool $is_param_in_body = true;

    /**
     * @param string $serviceName 服务名
     * @param string $metadata JSON格式String 实例元数据
     */
    public function __construct(string $serviceName, string $metadata)
    {
        self::build_params([
            'serviceName' => $serviceName,
            'metadata' => $metadata,
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
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceMetadataBatchDeleteRequest
    {
        $this->params['namespaceId'] = $namespaceId;
        return $this;
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceMetadataBatchDeleteRequest
    {
        $this->params['groupName'] = $groupName;
        return $this;
    }

    /**
     * 持久化类型，默认为空
     * 实例的持久化类型，当为‘persist’，表示对持久化实例的元数据进行删除；否则表示对临时实例的元数据进行
     * @param string $consistencyType
     * @return $this
     */
    public function paramConsistencyType(string $consistencyType): NacosDiscoveryInstanceMetadataBatchDeleteRequest{
        $this->params['consistencyType'] = $consistencyType;
        return $this;
    }

    /**
     * 需要更新的实例列表，默认为空
     * 待更新的实例列表，json数组，通过ip+port+ephemeral+cluster定位到某一实例，为空则表示更新指定服务下所有实例的元数据
     * @param string $instances
     * @return $this
     */
    public function paramInstances(string $instances): NacosDiscoveryInstanceMetadataBatchDeleteRequest
    {
        $this->params['instances'] = $instances;
        return $this;
    }
}