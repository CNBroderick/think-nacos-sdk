<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\client;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosClientSubscribeListResponse extends JsonNacosResponse
{
    private array $list = [];

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        foreach ($this->data as $item) {
            $this->list[] = (new NacosClientSubscribe())
                ->setNamespace($item['namespace'])
                ->setGroup($item['group'])
                ->setServiceName($item['serviceName'])
                ->setSubscriberInfoApp($item['subscriberInfo']['app'])
                ->setSubscriberInfoAgent($item['subscriberInfo']['agent'])
                ->setSubscriberInfoAddr($item['subscriberInfo']['addr']);
        }
    }

    public function getList(): array
    {
        return $this->list;
    }
}