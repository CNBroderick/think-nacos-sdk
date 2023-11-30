<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\instance;

class NacosDiscoveryInstanceListQueryResponseHost
{
    private string $instanceId;
    private string $ip;
    private int $port;
    private int $weight;
    private bool $healthy;
    private bool $enabled;
    private bool $ephemeral;
    private string $clusterName;
    private string $serviceName;
    private array $metadata;
    private int $instanceHeartBeatInterval;
    private string $instanceIdGenerator;
    private int $instanceHeartBeatTimeOut;
    private int $ipDeleteTimeout;

    public function __construct(array $data)
    {
        $this->instanceId = $data['instanceId'];
        $this->ip = $data['ip'];
        $this->port = $data['port'];
        $this->weight = $data['weight'];
        $this->healthy = $data['healthy'];
        $this->enabled = $data['enabled'];
        $this->ephemeral = $data['ephemeral'];
        $this->clusterName = $data['clusterName'];
        $this->serviceName = $data['serviceName'];
        $this->metadata = $data['metadata'];
        $this->instanceHeartBeatInterval = $data['instanceHeartBeatInterval'];
        $this->instanceIdGenerator = $data['instanceIdGenerator'];
        $this->instanceHeartBeatTimeOut = $data['instanceHeartBeatTimeOut'];
        $this->ipDeleteTimeout = $data['ipDeleteTimeout'];
    }

    public function getInstanceId(): string
    {
        return $this->instanceId;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function isHealthy(): bool
    {
        return $this->healthy;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function isEphemeral(): bool
    {
        return $this->ephemeral;
    }

    public function getClusterName(): string
    {
        return $this->clusterName;
    }

    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function getInstanceHeartBeatInterval(): int
    {
        return $this->instanceHeartBeatInterval;
    }

    public function getInstanceIdGenerator(): string
    {
        return $this->instanceIdGenerator;
    }

    public function getInstanceHeartBeatTimeOut(): int
    {
        return $this->instanceHeartBeatTimeOut;
    }

    public function getIpDeleteTimeout(): int
    {
        return $this->ipDeleteTimeout;
    }

}