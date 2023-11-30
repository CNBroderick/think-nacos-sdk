<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\system;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoverySystemRaftLeaderQueryResponse extends JsonNacosResponse
{

    private array $leader;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->leader = json_decode($body['leader'], true);
    }

    public function getLeader(): array
    {
        return $this->leader;
    }

}