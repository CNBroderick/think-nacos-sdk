<?php

namespace think\sdk\alibaba\nacos\v2\auth;

use think\facade\Cache;
use think\sdk\alibaba\nacos\v2\config\NacosConfig;
use think\sdk\alibaba\nacos\v2\request\auth\NacosAuthLoginRequest;

class NacosTokenManager
{
    private static NacosTokenManager $instance;

    private NacosToken $token;
    private NacosConfig $config;

    private function __construct()
    {
        $this->config = NacosConfig::getInstance();
        $this->initToken();
    }

    public static function getInstance(): NacosTokenManager
    {
        if (!self::$instance) {
            self::$instance = new NacosTokenManager();
        }
        return self::$instance;
    }

    private function getTokenCacheKey(): string
    {
        return $this->config->getCacheKey('access-token');
    }

    private function initToken(): void
    {
        if (!$this->config->isEnableAuth()) return;

        $cacheKey = $this->getTokenCacheKey();
        $token = Cache::get($cacheKey);
        if ($token) $token = NacosToken::from_json($token);

        if ($token && !$token->isExpired()) {
            $this->token = $token;
            return;
        }

        $this->refreshToken();
        Cache::set($cacheKey, $this->token->toJson(), $this->token->getExpireTime() - time() - 10);
    }

    public function refreshToken()
    {
        if (!$this->config->isEnableAuth()) return;

        $data = (new NacosAuthLoginRequest($this->config->getUsername(), $this->config->getPassword()))->request()->getData();
        $this->token = new NacosToken($data['accessToken'], $data['tokenTtl'] + time(), $data['globalAdmin']);
    }

    public function getAccessToken(): string
    {
        if (!$this->config->isEnableAuth()) return '';

        $token = $this->token->getAccessToken();
        if ($token) return $token;
        $this->refreshToken();
        return $this->token->getToken();
    }

    public function getToken(): NacosToken
    {
        return $this->token;
    }

    public function setToken(NacosToken $token): void
    {
        $this->token = $token;
    }

    public function isGlobalAdmin(): bool
    {
        return $this->token->isGlobalAdmin();
    }
}