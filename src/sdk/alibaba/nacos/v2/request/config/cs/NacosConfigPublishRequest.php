<?php

namespace think\sdk\alibaba\nacos\v2\request\config\cs;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 发布 Nacos 上的配置。
 * @package think\sdk\alibaba\nacos\v2\request\config\cs
 * @see https://nacos.io/zh-cn/docs/open-api.html 配置管理->发布配置
 */
class NacosConfigPublishRequest extends AbstractNacosRequest
{
    protected string $requestName = '配置管理->获取配置';
    protected string $uri = '/nacos/v1/cs/configs';
    protected string $method = 'POST';
    protected bool $is_param_in_body = true;

    protected array $requireParams = [
        'dataId' => '配置ID',
        'group' => '配置分组',
        'content' => '配置内容',
    ];

    protected array $optionalParams = [
        'tenant' => '租户信息，对应 Nacos 的命名空间ID字段',
        'type' => '配置类型',
    ];


    /**
     * @param string $dataId 配置ID
     * @param string $group 配置分组
     * @param string $content 配置内容
     */
    public function __construct(
        string $dataId,
        string $group,
        string $content
    )
    {
        self::build_params([
            'dataId' => $dataId,
            'group' => $group,
            'content' => $content,
        ]);
    }


    public function request(array $addition_params = []): BoolResultNacosResponse
    {
        list($response, $body) = $this->doRequest($addition_params);
        return new BoolResultNacosResponse($response, $body);
    }

    /**
     * 租户信息，对应 Nacos 的命名空间ID字段
     * @param string $tenant
     * @return void
     */
    public function paramTenant(string $tenant): NacosConfigPublishRequest {
        self::param('tenant', $tenant);
        return $this;
    }

    /**
     * 配置类型
     * @param string $type
     * @return void
     */
    public function paramType(string $type): NacosConfigPublishRequest {
        self::param('type', $type);
        return $this;
    }

}