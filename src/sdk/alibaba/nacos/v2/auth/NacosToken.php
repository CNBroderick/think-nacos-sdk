<?php

namespace think\sdk\alibaba\nacos\v2\auth;

class NacosToken
{
    private string $accessToken;
    private int $expireTime;

    private bool $globalAdmin;

    public function __construct($accessToken, $expireTime, $globalAdmin)
    {
        $this->accessToken = $accessToken;
        $this->expireTime = $expireTime;
        $this->globalAdmin = $globalAdmin;
    }

    public function toJson(): string
    {
        return json_encode([
            'accessToken' => $this->accessToken,
            'expireTime' => $this->expireTime,
            'globalAdmin' => $this->globalAdmin,
        ]);
    }

    public static function from_json($json): NacosToken
    {
        $data = json_decode($json, true);
        return new NacosToken($data['accessToken'], $data['expireTime'], $data['globalAdmin']);
    }

    public function isExpired(): bool
    {
        return time() < $this->expireTime;
    }

    public function getToken(): string
    {
        return !$this->isExpired() ? $this->accessToken : '';
    }

    public function isGlobalAdmin(): bool
    {
        return $this->globalAdmin;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getExpireTime(): int
    {
        return $this->expireTime;
    }


}