<?php

namespace think\sdk\alibaba\nacos\v2\request\loader;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\loader\NacosLoaderCurrentResponse;

/**
 * 查询当前Nacos节点上的客户端连接列表
 * @package think\sdk\alibaba\nacos\v2\request\loader
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 连接负载管理->查询当前节点客户端连接列表
 */
class NacosLoaderCurrentRequest extends AbstractNacosRequest
{
    protected string $requestName = '连接负载管理->查询当前节点客户端连接列表';
    protected string $uri = '/nacos/v2/core/loader/current';
    protected string $method = 'GET';

    public function request(array $addition_params = []): NacosLoaderCurrentResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosLoaderCurrentResponse($response, $response_body);
    }
}