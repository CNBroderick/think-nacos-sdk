<?php

namespace think\sdk\alibaba\nacos\v2\response\client;

class NacosClientPublisherService
{

    /**
     * @var string 客户端id
     */
    private string $clientId;

    /**
     * @var string 客户端IP
     */
    private string $ip;

    /**
     * @var int 客户端端口
     */
    private int $port;

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function setClientId(string $clientId): NacosClientPublisherService
    {
        $this->clientId = $clientId;
        return $this;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): NacosClientPublisherService
    {
        $this->ip = $ip;
        return $this;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function setPort(int $port): NacosClientPublisherService
    {
        $this->port = $port;
        return $this;
    }



}