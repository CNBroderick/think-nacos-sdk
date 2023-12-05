<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\client;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosClientPublicListResponse extends JsonNacosResponse
{

    /**
     * @var string 命名空间
     */
    private string $namespace;

    /**
     * @var string 分组名
     */
    private string $group;

    /**
     * @var string 服务名
     */
    private string $serviceName;

    /**
     * @var string IP地址
     */
    private string $ip;

    /**
     * @var int 端口号
     */
    private int $port;

    /**
     * @var string 集群名
     */
    private string $cluster;

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->namespace = $this->data['namespace'];
        $this->group = $this->data['group'];
        $this->serviceName = $this->data['serviceName'];
        $this->ip = $this->data['registeredInstance']['ip'];
        $this->port = $this->data['registeredInstance']['port'];
        $this->cluster = $this->data['registeredInstance']['cluster'];
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getCluster(): string
    {
        return $this->cluster;
    }

}