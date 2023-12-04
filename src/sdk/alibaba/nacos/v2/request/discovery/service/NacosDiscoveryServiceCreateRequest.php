<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\service;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\common\BoolResultNacosResponse;

/**
 * 创建一个服务
 * 服务已存在时会创建失败
 * @package think\sdk\alibaba\nacos\v2\request\discovery\service
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->创建服务
 */
class NacosDiscoveryServiceCreateRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->创建服务';

    protected string $uri = '/nacos/v2/ns/service';
    protected string $method = 'POST';

    protected array $requireParams = [
        'serviceName' => '服务名',
    ];
    protected array $optionalParams = [
        'namespaceId' => '命名空间Id，默认为public',
        'groupName' => '分组名，默认为DEFAULT_GROUP',
        'metadata' => '服务元数据，默认为空',
        'ephemeral' => '是否为临时实例，默认为false',
        'protectThreshold' => '保护阈值，默认为0',
        'selector' => '访问策略，默认为空',
    ];

    /**
     * @param $serviceName
     */
    public function __construct($serviceName)
    {
        self::build_params([
            'serviceName' => $serviceName,
        ]);
    }

    public function request(array $addition_params = []): BoolResultNacosResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new BoolResultNacosResponse($response, $response_body);
    }

    /**
     * 命名空间Id，默认为public
     * @param string $namespaceId
     * @return $this
     */
    public function namespaceId(string $namespaceId): NacosDiscoveryServiceCreateRequest{
        $this->params['namespaceId'] = $namespaceId;
        return $this;
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function groupName(string $groupName): NacosDiscoveryServiceCreateRequest
    {
        $this->params['groupName'] = $groupName;
        return $this;
    }

    /**
     * 服务元数据，默认为空
     * @param string $metadata JSON格式String
     * @return $this
     */
    public function metadata(string $metadata): NacosDiscoveryServiceCreateRequest{
        $this->params['metadata'] = $metadata;
        return $this;
    }

    /**
     * 是否为临时实例，默认为false
     * @param bool $ephemeral
     * @return $this
     */
    public function ephemeral(bool $ephemeral): NacosDiscoveryServiceCreateRequest
    {
        $this->params['ephemeral'] = $ephemeral;
        return $this;
    }

    /**
     * 保护阈值，默认为0
     * @param float $protectThreshold
     * @return $this
     */
    public function protectThreshold(float $protectThreshold): NacosDiscoveryServiceCreateRequest
    {
        $this->params['protectThreshold'] = $protectThreshold;
        return $this;
    }

    /**
     * 访问策略，默认为空
     * @param string $selector JSON格式String
     * @return $this
     */
    public function selector(string $selector): NacosDiscoveryServiceCreateRequest
    {
        $this->params['selector'] = $selector;
        return $this;
    }
}