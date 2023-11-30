<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\system;

class NacosDiscoverySystemRaftLeaderQueryResponseLeader
{

    private int $heartbeatDueMs;
    private string $ip;
    private int $leaderDueMs;
    private string $state;
    private int $term;
    private string $voteFor;


    public function __construct(array $data)
    {
        $this->heartbeatDueMs = $data['heartbeatDueMs'];
        $this->ip = $data['ip'];
        $this->leaderDueMs = $data['leaderDueMs'];
        $this->state = $data['state'];
        $this->term = $data['term'];
        $this->voteFor = $data['voteFor'];
    }

    public function getHeartbeatDueMs(): int
    {
        return $this->heartbeatDueMs;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getLeaderDueMs(): int
    {
        return $this->leaderDueMs;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getTerm(): int
    {
        return $this->term;
    }

    public function getVoteFor(): string
    {
        return $this->voteFor;
    }

}