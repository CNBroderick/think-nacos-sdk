<?php

namespace think\sdk\alibaba\nacos\v2\request\loader;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\SuccessResultNacosResponse;

/**
 * 重新加载当前Nacos节点的客户端连接数量
 * @package think\sdk\alibaba\nacos\v2\request\loader
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 连接负载管理->重新加载当前节点客户端连接数量
 */
class NacosLoaderCurrentReloadRequest extends AbstractNacosRequest
{
    protected string $requestName = '连接负载管理->重新加载当前节点客户端连接数量';
    protected string $uri = '/nacos/v2/core/loader/current/reloadCurrent';
    protected string $method = 'GET';

    protected array $requireParams = [
        'count' => '连接数量',
    ];

    protected array $optionalParams = [
        'redirectAddress'  =>'重定向地址',
    ];

    /**
     * @param int $count 连接数量
     */
    public function __construct(int $count)
    {
        self::build_params([
            'count' => $count,
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
    public function paramRedirectAddress(string $redirectAddress): NacosLoaderCurrentReloadRequest {
        $this->params['redirectAddress'] = $redirectAddress;
        return $this;
    }
}