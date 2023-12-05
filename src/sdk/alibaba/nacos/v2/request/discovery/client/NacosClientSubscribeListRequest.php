<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\client;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\client\NacosClientPublicListResponse;

/**
 * 查询指定客户端的订阅信息
 *
 * 客户端不存在时会报错
 *
 * @package think\sdk\alibaba\nacos\v2\request\discovery\client
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查询客户端的订阅信息
 */
class NacosClientSubscribeListRequest extends AbstractNacosRequest
{

    protected string $requestName = '服务发现->查询客户端的订阅信息';

    protected string $uri = '/nacos/v2/ns/client/subscribe/list';
    protected string $method = 'GET';

    protected array $requireParams = [
        'clientId' => '客户端ID',
    ];

    /**
     * @param string $clientId 客户端ID
     */
    public function __construct(string $clientId)
    {
        self::build_params([
            'clientId' => $clientId,
        ]);
    }

    public function request(array $addition_params = []): NacosClientPublicListResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosClientPublicListResponse($response, $response_body);
    }
}