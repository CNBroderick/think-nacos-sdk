<?php

namespace think\sdk\alibaba\nacos\v2\request\loader;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\SuccessResultNacosResponse;

/**
 * 根据 SDK 连接 ID 发送连接重置请求
 * @package think\sdk\alibaba\nacos\v2\request\loader
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 连接负载管理->重置指定客户端的连接
 */
class NacosLoaderCurrentReloadClientRequest extends AbstractNacosRequest
{
    protected string $requestName = '连接负载管理->重置指定客户端的连接';
    protected string $uri = '/nacos/v2/core/loader/current/reloadClient';
    protected string $method = 'GET';

    protected array $requireParams = [
        'connectionId' => '连接ID',
    ];

    protected array $optionalParams = [
        'redirectAddress'  =>'重定向地址',
    ];

    /**
     * @param int $connectionId 连接ID
     */
    public function __construct(int $connectionId)
    {
        self::build_params([
            'connectionId' => $connectionId,
        ]);
    }

    public function request(array $addition_params = []): SuccessResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new SuccessResultNacosResponse($response, $response_body);
    }

    /**
     * @param string $redirectAddress 重定向地址
     * @return $this
     */
    public function paramRedirectAddress(string $redirectAddress): NacosLoaderCurrentReloadClientRequest {
        $this->params['redirectAddress'] = $redirectAddress;
        return $this;
    }
}