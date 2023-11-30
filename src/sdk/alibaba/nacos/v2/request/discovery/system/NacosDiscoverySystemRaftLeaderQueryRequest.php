<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\system;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\system\NacosDiscoverySystemRaftLeaderQueryResponse;

/**
 * 查看当前集群leader
 * @package think\sdk\alibaba\nacos\v2\request\discovery\system
 * @see https://nacos.io/zh-cn/docs/open-api.html 服务发现->查看当前集群leader
 */
class NacosDiscoverySystemRaftLeaderQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->查看当前集群leader';

    protected string $uri = '/nacos/v1/ns/raft/leader';
    protected string $method = 'GET';

    protected array $requireParams = [];
    protected array $optionalParams = [];
    

    public function request(array $addition_params = []): NacosDiscoverySystemRaftLeaderQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoverySystemRaftLeaderQueryResponse($response_body, $response);
    }

}