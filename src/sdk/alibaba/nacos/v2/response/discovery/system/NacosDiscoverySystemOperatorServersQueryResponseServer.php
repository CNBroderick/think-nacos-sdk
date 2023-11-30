<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\system;

class NacosDiscoverySystemOperatorServersQueryResponseServer
{
    private string $ip;
    private int $servePort;
    private string $site;
    private int $weight;
    private int $adWeight;
    private bool $alive;
    private int $lastRefTime;
    private string $lastRefTimeStr;
    private string $key;

    public function __construct(array $data)
    {
        $this->ip = $data['ip'];
        $this->servePort = $data['servePort'];
        $this->site = $data['site'];
        $this->weight = $data['weight'];
        $this->adWeight = $data['adWeight'];
        $this->alive = $data['alive'];
        $this->lastRefTime = $data['lastRefTime'];
        $this->lastRefTimeStr = $data['lastRefTimeStr'];
        $this->key = $data['key'];
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getServePort(): int
    {
        return $this->servePort;
    }

    public function getSite(): string
    {
        return $this->site;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getAdWeight(): int
    {
        return $this->adWeight;
    }

    public function isAlive(): bool
    {
        return $this->alive;
    }

    public function getLastRefTime(): int
    {
        return $this->lastRefTime;
    }

    public function getLastRefTimeStr(): string
    {
        return $this->lastRefTimeStr;
    }

    public function getKey(): string
    {
        return $this->key;
    }

}