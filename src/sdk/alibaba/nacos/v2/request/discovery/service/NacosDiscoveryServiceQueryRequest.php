<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\service;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\service\NacosDiscoveryServiceQueryResponse;

/**
 * 查询一个服务
 * @package think\sdk\alibaba\nacos\v2\request\discovery\service
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查询服务
 */
class NacosDiscoveryServiceQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->查询服务';

    protected string $uri = '/nacos/v2/ns/service';
    protected string $method = 'GET';

    protected array $requireParams = [
        'serviceName' => '服务名',
    ];
    protected array $optionalParams = [
        'groupName' => '分组名，默认为DEFAULT_GROUP',
        'namespaceId' => '命名空间Id，默认为public',
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

    public function request(array $addition_params = []): NacosDiscoveryServiceQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoveryServiceQueryResponse($response, $response_body);
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryServiceQueryRequest{
        self::param('groupName', $groupName);
        return $this;
    }
    
    /**
     * 命名空间Id，默认为public
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryServiceQueryRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }
    
    
}