<?php

namespace think\sdk\alibaba\nacos\v2\request\client;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\client\NacosClientDetailResponse;

/**
 * 查询指定客户端的详细信息
 *
 * 客户端不存在时会报错
 *
 * 只有当clientType为connection时，会显示connectType，appName和appName字段
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查询客户端信息
 */
class NacosClientDetailRequest extends AbstractNacosRequest
{

    protected string $requestName = '服务发现->查询客户端列表';

    protected string $uri = '/nacos/v2/ns/client';
    protected string $method = 'GET';

    protected array $requireParams = [
        'clientId' => '客户端ID',
    ];

    public function request(array $addition_params = []): NacosClientDetailResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosClientDetailResponse($response, $response_body);
    }
}