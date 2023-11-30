<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\system;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoverySystemOperatorServersQueryResponse extends JsonNacosResponse
{

    private array $servers;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->servers = [];
        foreach ($body['servers'] as $server) {
            $this->servers[] = new NacosDiscoverySystemOperatorServersQueryResponseServer($server);
        }
    }

    public function getServers(): array
    {
        return $this->servers;
    }

}