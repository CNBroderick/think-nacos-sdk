<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\service;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\OkResultNacosResponse;

/**
 * 删除一个服务
 * @package think\sdk\alibaba\nacos\v2\request\discovery\service
 * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->删除服务
 */
class NacosDiscoveryServiceDeleteRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->删除服务';

    protected string $uri = '/nacos/v1/ns/service';
    protected string $method = 'DELETE';

    protected array $requireParams = [
        'serviceName' => '服务名',
    ];
    protected array $optionalParams = [
        'groupName' => '分组名',
        'namespaceId' => '命名空间ID',
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
    public function paramGroupName(string $groupName): NacosDiscoveryServiceDeleteRequest {
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 命名空间ID
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryServiceDeleteRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }
}