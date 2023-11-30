<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\service;


class NacosDiscoveryServiceQueryResponseCluster
{
    private array $healthChecker;
    private array $metadata;
    private string $name;


    public function __construct($data)
    {
        $this->healthChecker = $data['healthChecker'];
        $this->metadata = $data['metadata'];
        $this->name = $data['name'];
    }

    public function getHealthChecker(): array
    {
        return $this->healthChecker;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function getName(): string
    {
        return $this->name;
    }

}