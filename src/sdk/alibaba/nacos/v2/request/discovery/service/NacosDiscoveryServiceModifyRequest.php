<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\service;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\OkResultNacosResponse;

/**
 * 更新一个服务
 * @package think\sdk\alibaba\nacos\v2\request\discovery\service
 * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->修改服务
 */
class NacosDiscoveryServiceModifyRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->修改服务';

    protected string $uri = '/nacos/v1/ns/service';
    protected string $method = 'PUT';

    protected array $requireParams = [
        'serviceName' => '服务名',
    ];
    protected array $optionalParams = [
        'groupName' => '分组名',
        'namespaceId' => '命名空间ID',
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
    public function paramGroupName(string $groupName): NacosDiscoveryServiceModifyRequest{
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 命名空间ID
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