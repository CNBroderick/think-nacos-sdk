<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\instance;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoveryInstanceQueryResponse extends JsonNacosResponse
{
    private array $metadata;
    private string $instanceId;
    private int $port;
    private string $service;
    private bool $healthy;
    private string $ip;
    private string $clusterName;
    private float $weight;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->metadata = $this->data['metadata'];
        $this->instanceId = $this->data['instanceId'];
        $this->port = $this->data['port'];
        $this->service = $this->data['service'];
        $this->healthy = $this->data['healthy'];
        $this->ip = $this->data['ip'];
        $this->clusterName = $this->data['clusterName'];
        $this->weight = $this->data['weight'];
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function getInstanceId(): string
    {
        return $this->instanceId;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getService(): string
    {
        return $this->service;
    }

    public function isHealthy(): bool
    {
        return $this->healthy;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getClusterName(): string
    {
        return $this->clusterName;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }
}