<?php

namespace think\sdk\alibaba\nacos\v2\request\loader;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\OkResultNacosResponse;

/**
 * 智能平衡Nacos集群中所有节点的客户端连接数
 * @package think\sdk\alibaba\nacos\v2\request\loader
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 连接负载管理->智能平衡集群节点的连接数
 */
class NacosLoaderCurrentSmartReloadClusterRequest extends AbstractNacosRequest
{
    protected string $requestName = '连接负载管理->智能平衡集群节点的连接数';
    protected string $uri = '/nacos/v2/core/loader/current/smartReloadCluster';
    protected string $method = 'GET';

    protected array $requireParams = [];

    protected array $optionalParams = [
        'loaderFactor'  =>'加载因子，默认加载因子0.1，每个节点的SDK数量（1-loaderFactor）* avg~（1+loaderFactor）* avg',
        'force'  =>'是否强制',
    ];

    public function request(array $addition_params = []): OkResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new OkResultNacosResponse($response, $response_body);
    }

    /**
     * @param string $redirectAddress 重定向地址
     * @return $this
     */
    public function paramRedirectAddress(string $redirectAddress): NacosLoaderCurrentSmartReloadClusterRequest {
        $this->params['redirectAddress'] = $redirectAddress;
        return $this;
    }

    /**
     * @param float $loaderFactor 加载因子，默认加载因子0.1，每个节点的SDK数量（1-loaderFactor）* avg~（1+loaderFactor）* avg
     * @return $this
     */
    public function paramLoaderFactor(float $loaderFactor): NacosLoaderCurrentSmartReloadClusterRequest
    {
        $this->params['loaderFactor'] = $loaderFactor;
        return $this;
    }

    /**
     * @param string $force 是否强制
     * @return $this
     */
    public function paramForce(string $force): NacosLoaderCurrentSmartReloadClusterRequest{
        $this->params['force'] = $force;
        return $this;
    }
}