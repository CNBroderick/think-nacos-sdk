<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\service;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 更新指定服务
 *
 * 服务不存在时会报错
 * @package think\sdk\alibaba\nacos\v2\request\discovery\service
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->修改服务
 */
class NacosDiscoveryServiceModifyRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->修改服务';

    protected string $uri = '/nacos/v2/ns/service';
    protected string $method = 'PUT';
    protected bool $is_param_in_body = true;

    protected array $requireParams = [
        'serviceName' => '服务名',
    ];
    protected array $optionalParams = [
        'groupName' => '分组名，默认为DEFAULT_GROUP',
        'namespaceId' => '命名空间ID，默认为public',
        'protectThreshold' => '保护阈值,取值0到1,默认0',
        'metadata' => '元数据（JSON格式字符串）',
        'selector' => '访问策略（JSON格式字符串）',
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


    public function request(array $addition_params = []): BoolResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new BoolResultNacosResponse($response, $response_body);
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryServiceModifyRequest{
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 命名空间ID，默认为public
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryServiceModifyRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 保护阈值,取值0到1,默认0
     * @param float $protectThreshold
     * @return $this
     */
    public function paramProtectThreshold(float $protectThreshold): NacosDiscoveryServiceModifyRequest
    {
        self::param('protectThreshold', $protectThreshold);
        return $this;
    }

    /**
     * 元数据（JSON格式字符串）
     * @param string $metadata
     * @return $this
     */
    public function paramMetadata(string $metadata): NacosDiscoveryServiceModifyRequest{
        self::param('metadata', $metadata);
        return $this;
    }

    /**
     * 访问策略（JSON格式字符串）
     * @param string $selector
     * @return $this
     */
    public function paramSelector(string $selector): NacosDiscoveryServiceModifyRequest{
        self::param('selector', $selector);
        return $this;
    }
}