<?php

namespace think\sdk\alibaba\nacos\v2\request\cluster;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\cluster\NacosClusterNodeSelfHealthyResponse;

/**
 * 查询当前nacos节点信息
 * @package think\sdk\alibaba\nacos\v2\request\cluster
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 集群管理->创建命名空间
 */
class NacosClusterNodeSelfHealthyRequest extends AbstractNacosRequest
{
    protected string $requestName = '集群管理->查询当前节点信息';
    protected string $uri = '/nacos/v2/core/cluster/node/self/health';
    protected string $method = 'GET';

    public function request(array $addition_params = []): NacosClusterNodeSelfHealthyResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosClusterNodeSelfHealthyResponse($response, $response_body);
    }

}