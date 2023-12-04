<?php

namespace think\sdk\alibaba\nacos\v2\request\config\cs;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

/**
 * 获取Nacos上的配置。
 * @package think\sdk\alibaba\nacos\v2\request\config\cs
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 配置管理->获取配置
 */
class NacosConfigQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '配置管理->获取配置';
    protected string $uri = '/nacos/v2/cs/config';
    protected string $method = 'GET';

    protected array $requireParams = [
        'dataId' => '配置 ID',
        'group' => '配置分组',
    ];
    protected array $optionalParams = [
        'namespaceId' => '命名空间，默认为public与 \'\'相同',
        'tag' => '标签',
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

    public function request(array $addition_params = []): JsonNacosResponse
    {
        list($response, $body) = $this->doRequest($addition_params);
        return new JsonNacosResponse($response, $body);
    }

    /**
     * 租户信息，对应 Nacos 的命名空间ID字段
     * @param string $namespaceId
     * @return NacosConfigQueryRequest
     */
    public function paramNamespaceId(string $namespaceId): NacosConfigQueryRequest {
        self::param('namespaceId', $namespaceId);
        return $this;
    }
}