<?php

namespace think\sdk\alibaba\nacos\v2\request\client;

use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\client\NacosClientPublisherServiceListResponse;

/**
 * 查询注册指定服务的客户端信息
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查询注册指定服务的客户端信息
 */
class NacosClientPublisherServiceListRequest extends AbstractNacosRequest
{

    protected string $requestName = '服务发现->查询注册指定服务的客户端信息';

    protected string $uri = '/nacos/v2/ns/client/service/publisher/list';
    protected string $method = 'GET';

    protected array $requireParams = [
        'serviceName' => '	服务名',
    ];

    protected array $optionalParams = [
        'namespaceId' => '命名空间Id，默认为public',
        'groupName' => '分组名，默认为DEFAULT_GROUP',
        'ephemeral' => '是否为临时实例',
        'ip' => 'IP地址，默认为空，不限制IP地址',
        'port' => '端口号，默认为空，表示不限制端口号',
    ];

    /**
     * @param string $serviceName 服务名
     */
    public function __construct(string $serviceName)
    {
        self::build_params([
            'serviceName' => $serviceName,
        ]);
    }

    public function request(array $addition_params = []): NacosClientPublisherServiceListResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosClientPublisherServiceListResponse($response, $response_body);
    }

    /**
     * 命名空间Id，默认为public
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosClientPublisherServiceListRequest
    {
        $this->params['namespaceId'] = $namespaceId;
        return $this;
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosClientPublisherServiceListRequest
    {
        $this->params['groupName'] = $groupName;
        return $this;
    }

    /**
     * 是否为临时实例
     * @param bool $ephemeral
     * @return $this
     */
    public function paramEphemeral(bool $ephemeral): NacosClientPublisherServiceListRequest
    {
        $this->params['ephemeral'] = $ephemeral;
        return $this;
    }

    /**
     * IP地址，默认为空，不限制IP地址
     * @param string $ip
     * @return $this
     */
    public function paramIp(string $ip): NacosClientPublisherServiceListRequest
    {
        $this->params['ip'] = $ip;
        return $this;
    }

    /**
     * 端口号，默认为空，表示不限制端口号
     * @param int $port
     * @return $this
     */
    public function paramPort(int $port): NacosClientPublisherServiceListRequest
    {
        $this->params['port'] = $port;
        return $this;
    }
}