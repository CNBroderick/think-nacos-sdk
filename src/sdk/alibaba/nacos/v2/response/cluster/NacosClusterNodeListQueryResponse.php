<?php

namespace think\sdk\alibaba\nacos\v2\response\cluster;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosClusterNodeListQueryResponse extends JsonNacosResponse
{
    private array $list = [];

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);

        foreach ($this->data['list'] as $item) {
            $this->list[] = new NacosClusterNode($item);
        }
    }

    public function getList(): array
    {
        return $this->list;
    }


}