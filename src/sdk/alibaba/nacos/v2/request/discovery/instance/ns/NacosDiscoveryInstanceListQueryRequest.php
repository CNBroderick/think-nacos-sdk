<?php

namespace think\sdk\alibaba\nacos\v2\request\discovery\instance\ns;

use think\sdk\alibaba\nacos\v2\Nacos;
use think\sdk\alibaba\nacos\v2\request\AbstractNacosRequest;
use think\sdk\alibaba\nacos\v2\response\discovery\instance\NacosDiscoveryInstanceListQueryResponse;

/**
 * 查询服务下的实例列表
 * @package think\sdk\alibaba\nacos\v2\request\discovery\instance
 * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 服务发现->查询指定服务的实例列表
 */
class NacosDiscoveryInstanceListQueryRequest extends AbstractNacosRequest
{
    protected string $requestName = '服务发现->查询指定服务的实例列表';
    protected string $uri = '/nacos/v2/ns/instance/list';
    protected string $method = 'GET';

    protected array $requireParams = [
        'serviceName' => '服务名',
    ];
    protected array $optionalParams = [
        'namespaceId' => '命名空间Id，默认为public',
        'groupName' => '分组名，默认为DEFAULT_GROUP',
        'clusterName' => '集群名称，默认为DEFAULT',
        'ip' => 'IP地址，默认为空，表示不限制IP地址',
        'port' => '端口号，默认为0，表示不限制端口号',
        'healthyOnly' => '是否只获取健康实例，默认为false',
        'app' => '应用名，默认为空',
    ];

    /**
     * @param $serviceName
     */
    public function __construct($serviceName)
    {
        $this ->headers['User-Agent'] = Nacos::getUserAgent();
        $this ->headers['Client-Version'] = Nacos::getClientVersions();
        self::build_params([
            'serviceName' => $serviceName,
        ]);
    }

    public function request(array $addition_params = []): NacosDiscoveryInstanceListQueryResponse
    {
        list($response, $response_body) = $this->doRequest($addition_params);
        return new NacosDiscoveryInstanceListQueryResponse($response, $response_body);
    }

    /**
     * 命名空间Id，默认为public
     * @param string $namespaceId
     * @return $this
     */
    public function paramNamespaceId(string $namespaceId): NacosDiscoveryInstanceListQueryRequest
    {
        $this->params['namespaceId'] = $namespaceId;
        return $this;
    }

    /**
     * 分组名，默认为DEFAULT_GROUP
     * @param string $groupName
     * @return $this
     */
    public function paramGroupName(string $groupName): NacosDiscoveryInstanceListQueryRequest
    {
        $this->params['groupName'] = $groupName;
        return $this;
    }

    /**
     * 集群名称，默认为DEFAULT
     * @param string $clusterName
     * @return $this
     */
    public function paramClusterName(string $clusterName): NacosDiscoveryInstanceListQueryRequest
    {
        $this->params['clusterName'] = $clusterName;
        return $this;
    }

    /**
     * IP地址，默认为空，表示不限制IP地址
     * @param string $ip
     * @return $this
     */
    public function paramIp(string $ip): NacosDiscoveryInstanceListQueryRequest
    {
        $this->params['ip'] = $ip;
        return $this;
    }

    /**
     * 端口号，默认为0，表示不限制端口号
     * @param int $port
     * @return $this
     */
    public function paramPort(int $port): NacosDiscoveryInstanceListQueryRequest
    {
        $this->params['port'] = $port;
        return $this;
    }

    /**
     * 是否只获取健康实例，默认为false
     * @param bool $healthyOnly
     * @return $this
     */
    public function paramHealthyOnly(bool $healthyOnly): NacosDiscoveryInstanceListQueryRequest
    {
        $this->params['healthyOnly'] = $healthyOnly;
        return $this;
    }

    /**
     * 应用名，默认为空
     * @param string $app
     * @return $this
     */
    public function paramApp(string $app): NacosDiscoveryInstanceListQueryRequest
    {
        $this->params['app'] = $app;
        return $this;
    }
}