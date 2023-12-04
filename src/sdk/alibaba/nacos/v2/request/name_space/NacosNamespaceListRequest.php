<?php

namespace think\sdk\alibaba\nacos\v2\request\name_space;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\name_space\NacosNamespaceListResponse;

/**
 * 查询命名空间列表。
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 命名空间->查询命名空间列表
 */
class NacosNamespaceListRequest extends AbstractNacosRequest
{
    protected string $requestName = '命名空间->查询命名空间列表';
    protected string $uri = '/nacos/v2/console/namespace/list';
    protected string $method = 'GET';
    

    protected array $requireParams = [];
    protected array $optionalParams = [];


    public function request(array $addition_params = []): NacosNamespaceListResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosNamespaceListResponse($response, $response_body);
    }
}