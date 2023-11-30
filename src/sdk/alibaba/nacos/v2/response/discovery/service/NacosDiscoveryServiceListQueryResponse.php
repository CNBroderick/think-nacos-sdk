<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\service;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoveryServiceListQueryResponse extends JsonNacosResponse
{
    private int $count;
    private array $doms;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->count = $this->data['count'];
        $this->doms = $this->data['doms'];
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getDoms(): array
    {
        return $this->doms;
    }

}