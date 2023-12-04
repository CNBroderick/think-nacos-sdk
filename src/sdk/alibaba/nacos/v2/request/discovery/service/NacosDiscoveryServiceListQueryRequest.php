<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\service;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\service\NacosDiscoveryServiceListQueryResponse;

/**
 * 查询符合条件的服务列表
 * @package think\sdk\alibaba\nacos\v2\request\discovery\service
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查询服务列表
 */
class NacosDiscoveryServiceListQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->查询服务列表';

    protected string $uri = '/nacos/v2/ns/service/list';
    protected string $method = 'GET';

    protected array $requireParams = [
        'selector' => '服务名',
    ];
    protected array $optionalParams = [
        'namespaceId' => '命名空间Id，默认为public',
        'groupName' => '分组名，默认为DEFAULT_GROUP',
        'pageNo' => '当前页，默认为1',
        'pageSize' => '页条目数，默认为20，最大为500',
    ];


    /**
     * @param string $selector 访问策略，JSON格式String
     */
    public function __construct(string $selector)
    {
        self::build_params([
            'serviceName' => $selector,
        ]);
    }

    public function request(array $addition_params = []): NacosDiscoveryServiceListQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoveryServiceListQueryResponse($response, $response_body);
    }

    /**
     * 命名空间Id，默认为public
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryServiceListQueryRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryServiceListQueryRequest
    {
        self::param('groupName', $groupName);
        return $this;
    }

    /**
     * 当前页，默认为1
     * @param int $pageNo
     * @return $this
     */
    public function paramPageNo(int $pageNo): NacosDiscoveryServiceListQueryRequest
    {
        self::param('pageNo', $pageNo);
        return $this;
    }

    /**
     * 页条目数，默认为20，最大为500
     * @param int $pageSize
     * @return $this
     */
    public function paramPageSize(int $pageSize): NacosDiscoveryServiceListQueryRequest
    {
        self::param('pageSize', $pageSize);
        return $this;
    }
}