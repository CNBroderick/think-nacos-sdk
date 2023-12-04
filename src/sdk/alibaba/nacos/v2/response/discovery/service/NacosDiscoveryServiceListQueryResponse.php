<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\service;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoveryServiceListQueryResponse extends JsonNacosResponse
{
    private int $count;
    private array $services;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->count = $this->data['count'];
        $this->services = $this->data['services'];
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getServices(): array
    {
        return $this->services;
    }

}