<?php

namespace think\sdk\alibaba\nacos\v2\request\client;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

/**
 * 查询客户端列表
 *
 * 对于不同版本的nacos client，建立客户端的方式不同。
 *
 * 对于1.x版本，每个实例会建立两个基于ip+port的客户端，分别对应实例注册与服务订阅，clientId格式为 ip:port#ephemeral
 *
 * 对于2.x版本的nacos client, 每个实例会建立一个RPC连接，对应一个基于RPC连接的客户端，兼具注册与订阅功能，clientId 格式为time_ip_port
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查询客户端列表
 */
class NacosClientListRequest extends AbstractNacosRequest
{

    protected string $requestName = '服务发现->查询客户端列表';

    protected string $uri = '/nacos/v2/ns/client/list';
    protected string $method = 'GET';

    public function request(array $addition_params = []): JsonNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new JsonNacosResponse($response, $response_body);
    }
}