<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\instance\matadata;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoveryInstanceMetadataBatchResponse extends JsonNacosResponse
{
    private string $updated;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->updated = $this->data['updated'];
    }

    public function getUpdated(): string
    {
        return $this->updated;
    }

}