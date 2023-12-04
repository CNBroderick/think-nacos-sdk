<?php

namespace think\sdk\alibaba\nacos\v2\request\cluster;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\cluster\NacosClusterNodeListQueryResponse;

/**
 * 查询集群节点列表
 * @package think\sdk\alibaba\nacos\v2\request\cluster
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 集群管理->查询集群节点列表
 */
class NacosClusterNodeListQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '集群管理->查询集群节点列表';
    protected string $uri = '/nacos/v2/core/cluster/node/list';
    protected string $method = 'GET';

    protected array $optionalParams = [
        'address' => '节点地址',
        'state' => '节点状态',
    ];

    public function request(array $addition_params = []): NacosClusterNodeListQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosClusterNodeListQueryResponse($response, $response_body);
    }

    /**
     * @param string $address 节点地址
     * @return $this
     */
    public function paramAddress(string $address): NacosClusterNodeListQueryRequest
    {
        $this->params['address'] = $address;
        return $this;
    }

    /**
     * @param string $state 节点状态
     * @return $this
     */
    public function paramState(string $state): NacosClusterNodeListQueryRequest
    {
        $this->params['state'] = $state;
        return $this;
    }

}