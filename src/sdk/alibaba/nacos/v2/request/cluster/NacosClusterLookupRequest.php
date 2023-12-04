<?php

namespace think\sdk\alibaba\nacos\v2\request\cluster;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 切换集群寻址模式
 * @package think\sdk\alibaba\nacos\v2\request\cluster
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 集群管理->切换集群寻址模式
 */
class NacosClusterLookupRequest extends AbstractNacosRequest
{
    protected string $requestName = '集群管理->切换集群寻址模式';
    protected string $uri = '/nacos/v2/core/cluster/lookup';
    protected string $method = 'PUT';

    protected array $requireParams = [
        'type' => '寻址模式',
    ];

    /**
     * 文件配置寻址模式
     * @return NacosClusterLookupRequest
     */
    public static function forFile(): NacosClusterLookupRequest
    {
        return new NacosClusterLookupRequest('file');
    }

    /**
     * 地址服务器寻址模式
     * @return NacosClusterLookupRequest
     */
    public static function forAddressServer(): NacosClusterLookupRequest
    {
        return new NacosClusterLookupRequest('address-server');
    }

    /**
     * @param string $type 寻址模式有两种：file（文件配置）和 address-server（地址服务器）
     */
    public function __construct(string $type)
    {
        self::build_params([
            'type' => $type,
        ]);
    }

    public function request(array $addition_params = []): BoolResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new BoolResultNacosResponse($response, $response_body);
    }

}