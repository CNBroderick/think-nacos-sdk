<?php

namespace think\sdk\alibaba\nacos\v2\request\config\cs;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 删除 Nacos 上的配置。
 * @package think\sdk\alibaba\nacos\v2\request\config\cs
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 配置管理->删除配置
 */
class NacosConfigDeleteRequest extends AbstractNacosRequest
{
    protected string $requestName = '配置管理->删除配置';
    protected string $uri = '/nacos/v1/cs/configs';
    protected string $method = 'DELETE';

    protected array $requireParams = [
        'dataId' => '配置ID',
        'group' => '配置分组',
    ];

    protected array $optionalParams = [
        'namespaceId' => "命名空间，默认为public与 ''相同",
        'tag' => '标签',
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
     * 命名空间，默认为public与 ''相同
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosConfigDeleteRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 标签
     * @param string $tag
     * @return $this
     */
    public function paramTag(string $tag): NacosConfigDeleteRequest{
        self::param('tag', $tag);
        return $this;
    }
}