<?php

namespace think\sdk\alibaba\nacos\v2\request\loader;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\loader\NacosLoaderCurrentClusterResponse;

/**
 * 获取Nacos集群中所有的SDK指标
 * @package think\sdk\alibaba\nacos\v2\request\loader
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 连接负载管理->获取集群的SDK指标
 */
class NacosLoaderCurrentClusterRequest extends AbstractNacosRequest
{
    protected string $requestName = '连接负载管理->获取集群的SDK指标';
    protected string $uri = '/nacos/v2/core/loader/current/cluster';
    protected string $method = 'GET';

    public function request(array $addition_params = []): NacosLoaderCurrentClusterResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosLoaderCurrentClusterResponse($response, $response_body);
    }
}