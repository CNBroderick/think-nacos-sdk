<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\system;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\system\NacosDiscoverySystemOperatorServersQueryResponse;

/**
 * 查看当前集群Server列表
 * @package think\sdk\alibaba\nacos\v2\request\discovery\system
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查看当前集群Server列表
 */
class NacosDiscoverySystemOperatorServersQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->查看当前集群Server列表';

    protected string $uri = '/nacos/v1/ns/operator/servers';
    protected string $method = 'GET';

    protected array $requireParams = [];
    protected array $optionalParams = [
        'healthy' => '是否只返回健康Server节点'
    ];
    


    public function request(array $addition_params = []): NacosDiscoverySystemOperatorServersQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoverySystemOperatorServersQueryResponse($response, $response_body);
    }
    
    /**
     * 是否只返回健康Server节点
     * @param bool $healthy
     * @return $this
     */
    public function paramHealthy(bool $healthy): NacosDiscoverySystemOperatorServersQueryRequest
    {
        self::param('healthy', $healthy);
        return $this;
    }
}