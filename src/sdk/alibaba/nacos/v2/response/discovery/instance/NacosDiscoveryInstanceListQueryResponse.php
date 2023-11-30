<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\instance;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoveryInstanceListQueryResponse extends JsonNacosResponse
{
    private string $name;
    private string $groupName;
    private string $clusters;
    private int $cacheMillis;
    private int $lastRefTime;
    private string $checksum;
    private bool $allIPs;
    private bool $reachProtectionThreshold;
    private bool $valid;
    private array $hosts;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->name = $this->data['name'];
        $this->groupName = $this->data['groupName'];
        $this->clusters = $this->data['clusters'];
        $this->cacheMillis = $this->data['cacheMillis'];
        $this->lastRefTime = $this->data['lastRefTime'];
        $this->checksum = $this->data['checksum'];
        $this->allIPs = $this->data['allIPs'];
        $this->reachProtectionThreshold = $this->data['reachProtectionThreshold'];
        $this->valid = $this->data['valid'];
        $this->hosts = [];
        foreach ($this->data['hosts'] as $host) {
            $this->hosts[] = new NacosDiscoveryInstanceListQueryResponseHost($host);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getClusters(): string
    {
        return $this->clusters;
    }

    public function getCacheMillis(): int
    {
        return $this->cacheMillis;
    }

    public function getLastRefTime(): int
    {
        return $this->lastRefTime;
    }

    public function getChecksum(): string
    {
        return $this->checksum;
    }

    public function isAllIPs(): bool
    {
        return $this->allIPs;
    }

    public function isReachProtectionThreshold(): bool
    {
        return $this->reachProtectionThreshold;
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function getHosts(): array
    {
        return $this->hosts;
    }


}