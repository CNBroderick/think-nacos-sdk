<?php

namespace think\sdk\alibaba\nacos\v2\request\config\cs;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\StringNacosResponse;

/**
 * 获取Nacos上的配置。
 * @package think\sdk\alibaba\nacos\v2\request\config\cs
 * @see https://nacos.io/zh-cn/docs/open-api.html 配置管理->获取配置
 */
class NacosConfigQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '配置管理->获取配置';
    protected string $uri = '/nacos/v1/cs/configs';
    protected string $method = 'GET';

    protected array $requireParams = [
        'dataId' => '配置 ID',
        'group' => '配置分组',
    ];
    protected array $optionalParams = [
        'tenant' => '租户信息，对应 Nacos 的命名空间ID字段',
    ];

    /**
     * @param string $dataId
     * @param string $group
     */
    public function __construct(string $dataId, string $group)
    {
        self::build_params([
            'dataId' => $dataId,
            'group' => $group,
        ]);
    }

    public function request(array $addition_params = []): StringNacosResponse
    {
        list($response, $body) = $this->doRequest($addition_params);
        return new StringNacosResponse($response, $body);
    }

    /**
     * 租户信息，对应 Nacos 的命名空间ID字段
     * @param string $tenant
     * @return void
     */
    public function paramTenant(string $tenant): NacosConfigQueryRequest {
        self::param('tenant', $tenant);
        return $this;
    }
}