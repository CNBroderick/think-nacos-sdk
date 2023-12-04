<?php

namespace think\sdk\alibaba\nacos\v2\response\cluster;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosClusterNodeSelfHealthyResponse extends JsonNacosResponse
{
    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
    }

    /**
     * @return bool is starting
     */
    public function isStarting(): bool
    {
        return $this->data == 'STARTING';
    }

    /**
     * @return bool is up
     */
    public function isUp(): bool
    {
        return $this->data == 'UP';
    }

    /**
     * @return bool is suspicious
     */
    public function isSuspicious(): bool
    {
        return $this->data == 'SUSPICIOUS';
    }

    /**
     * @return bool is down
     */
    public function isDown(): bool
    {
        return $this->data == 'DOWN';
    }

    /**
     * @return bool is isolation
     */
    public function isIsolation(): bool
    {
        return $this->data == 'ISOLATION';
    }
}