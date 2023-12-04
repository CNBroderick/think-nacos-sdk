<?php

namespace think\sdk\alibaba\nacos\v2\response\auth;

use think\sdk\alibaba\nacos\v2\response\AbstractNacosResponse;

class NacosAuthLoginResponse extends AbstractNacosResponse
{
    private string $accessToken;
    private int $tokenTtl;
    private bool $globalAdmin;
    private array $data;

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->data = json_decode($body, true);

        $this->accessToken = $this->data['accessToken'];
        $this->tokenTtl = $this->data['tokenTtl'];
        $this->globalAdmin = $this->data['globalAdmin'];
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getTokenTtl(): int
    {
        return $this->tokenTtl;
    }

    public function isGlobalAdmin(): bool
    {
        return $this->globalAdmin;
    }


}