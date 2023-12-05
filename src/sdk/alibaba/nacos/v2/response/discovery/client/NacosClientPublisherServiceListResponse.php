<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\client;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosClientPublisherServiceListResponse extends JsonNacosResponse
{
    /**
     * @var array 客户端列表
     */
    private $clients = [];

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        foreach ($this->data as $item) {
            $this->clients[] = (new NacosClientPublisherService())
                ->setClientId($item['clientId'])
                ->setIp($item['ip'])
                ->setPort($item['port']);
        }
    }

    /**
     * @return NacosClientPublisherService[] 客户端列表
     */
    public function getClients(): array
    {
        return $this->clients;
    }
}