<?php

namespace think\sdk\alibaba\nacos\v2\request\config\cs;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 发布 Nacos 上的配置。
 * @package think\sdk\alibaba\nacos\v2\request\config\cs
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 配置管理->发布配置
 */
class NacosConfigPublishRequest extends AbstractNacosRequest
{
    protected string $requestName = '配置管理->获取配置';
    protected string $uri = '/nacos/v2/cs/config';
    protected string $method = 'POST';
    protected bool $is_param_in_body = true;

    protected array $requireParams = [
        'dataId' => '配置ID',
        'group' => '配置分组',
        'content' => '配置内容',
    ];

    protected array $optionalParams = [
        'namespaceId' => "命名空间，默认为public与 ''相同",
        'tag' => '标签',
        'appName' => '应用名',
        'srcUser' => '源用户',
        'configTags' => '配置标签列表，可多个，逗号分隔',
        'desc' => '配置描述',
        'use' => '-',
        'effect' => '-',
        'type' => '配置类型',
        'schema' => '-',
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
    public function paramNamespaceId(string $namespaceId): NacosConfigPublishRequest
    {
        self::param('namespaceId', $namespaceId);
        return $this;
    }

    /**
     * 标签
     * @param string $tag
     * @return $this
     */
    public function paramTag(string $tag): NacosConfigPublishRequest{
        self::param('tag', $tag);
        return $this;
    }

    /**
     * 应用名
     * @param string $appName
     * @return $this
     */
    public function paramAppName(string $appName): NacosConfigPublishRequest
    {
        self::param('appName', $appName);
        return $this;
    }

    /**
     * 源用户
     * @param string $srcUser
     * @return $this
     */
    public function paramSrcUser(string $srcUser): NacosConfigPublishRequest{
        self::param('srcUser', $srcUser);
        return $this;
    }

    /**
     * 配置标签列表，可多个，逗号分隔
     * @param string $configTags
     * @return $this
     */
    public function paramConfigTags(string $configTags): NacosConfigPublishRequest
    {
        self::param('configTags', $configTags);
        return $this;
    }

    /**
     * 配置描述
     * @param string $desc
     * @return $this
     */
    public function paramDesc(string $desc): NacosConfigPublishRequest{
        self::param('desc', $desc);
        return $this;
    }

    /**
     * -
     * @param string $use
     * @return $this
     */
    public function paramUse(string $use): NacosConfigPublishRequest
    {
        self::param('use', $use);
        return $this;
    }

    /**
     * -
     * @param string $effect
     * @return $this
     */
    public function paramEffect(string $effect): NacosConfigPublishRequest
    {
        self::param('effect', $effect);
        return $this;
    }

    /**
     * 配置类型
     * @param string $type
     * @return $this
     */
    public function paramType(string $type): NacosConfigPublishRequest{
        self::param('type', $type);
        return $this;
    }

    /**
     * -
     * @param string $schema
     * @return $this
     */
    public function paramSchema(string $schema): NacosConfigPublishRequest{
        self::param('schema', $schema);
        return $this;
    }
}