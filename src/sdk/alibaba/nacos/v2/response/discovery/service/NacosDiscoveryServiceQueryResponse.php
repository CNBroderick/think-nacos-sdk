<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\service;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoveryServiceQueryResponse extends JsonNacosResponse
{
    private array $metadata;
    private string $groupName;
    private string $namespaceId;
    private string $name;
    private array $selector;
    private int $protectThreshold;
    private array $clusters;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->metadata = $this->data['metadata'];
        $this->groupName = $this->data['groupName'];
        $this->namespaceId = $this->data['namespaceId'];
        $this->name = $this->data['$name'];
        $this->selector = $this->data['selector'];
        $this->protectThreshold = $this->data['protectThreshold'];
        $this->clusters = [];
        foreach ($this->data['clusters'] as $cluster) {
            $this->clusters [] = new NacosDiscoveryServiceQueryResponseCluster($cluster);
        }
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getNamespaceId(): string
    {
        return $this->namespaceId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSelector(): array
    {
        return $this->selector;
    }

    public function getProtectThreshold(): int
    {
        return $this->protectThreshold;
    }

    public function getClusters(): array
    {
        return $this->clusters;
    }
}