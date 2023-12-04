<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\service;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoveryServiceQueryResponse extends JsonNacosResponse
{

    /**
     * @var String 命名空间
     */
    private string $namespace;
    /**
     * @var String 分组名
     */
    private string $groupName;
    /**
     * @var String 服务名
     */
    private string $serviceName;
    /**
     * @var array 集群信息
     */
    private array $clusterMap;
    /**
     * @var array 服务元数据
     */
    private array $metadata;
    /**
     * @var float 保护阈值
     */
    private float $protectThreshold;
    /**
     * @var array 访问策略
     */
    private array $selector;
    /**
     * @var bool 是否为临时实例
     */
    private bool $ephemeral;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->namespace = $this->data['namespace'];
        $this->groupName = $this->data['groupName'];
        $this->serviceName = $this->data['serviceName'];
        $this->clusterMap = $this->data['clusterMap'];
        $this->metadata = $this->data['metadata'];
        $this->protectThreshold = $this->data['protectThreshold'];
        $this->selector = $this->data['selector'];
        $this->ephemeral = $this->data['ephemeral'];
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    public function getClusterMap(): array
    {
        return $this->clusterMap;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function getProtectThreshold(): float
    {
        return $this->protectThreshold;
    }

    public function getSelector(): array
    {
        return $this->selector;
    }

    public function isEphemeral(): bool
    {
        return $this->ephemeral;
    }
}