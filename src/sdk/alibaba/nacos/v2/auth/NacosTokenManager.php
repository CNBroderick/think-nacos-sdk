<?php

namespace think\sdk\alibaba\nacos\v2\auth;

use think\facade\Cache;
use think\facade\Log;
use think\sdk\alibaba\nacos\v2\config\NacosConfig;
use think\sdk\alibaba\nacos\v2\request\auth\NacosAuthLoginRequest;

class NacosTokenManager
{
    private static ?NacosTokenManager $instance = null;

    private NacosToken $token;
    private NacosConfig $config;

    public function __construct()
    {
        $this->config = NacosConfig::getInstance();
        $this->token = new NacosToken('', 0, false);
        Log::info('NacosTokenManager：4');
        $this->initToken();
        Log::info('NacosTokenManager：5');
    }

    public static function getInstance(): NacosTokenManager
    {
        if (!self::$instance) {
            Log::info('NacosTokenManager：1');
            $nacosTokenManager = new NacosTokenManager();
            Log::info('NacosTokenManager：2');
            self::$instance = $nacosTokenManager;
            Log::info('NacosTokenManager：3');
            return $nacosTokenManager;
        }
        Log::info('NacosTokenManager：3.1');
        return self::$instance;
    }

    private function getTokenCacheKey(): string
    {
        return $this->config->getCacheKey('access-token');
    }

    private function initToken(): void
    {
        if (!$this->config->isEnableAuth()) return;
//        Log::info('开始获取Nacos Token缓存：' . $this->config->getUsername() . ':' . $this->config->getPassword());
//
        $cacheKey = $this->getTokenCacheKey();
        $token = Cache::get($cacheKey);
        if ($token) $token = NacosToken::from_json($token);
        Log::info('获取Nacos Token缓存：' . json_encode($token));
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

        Log::info('开始登陆Nacos：' . $this->config->getUsername() . ':' . $this->config->getPassword());

        $response = (new NacosAuthLoginRequest(
            $this->config->getUsername(),
            $this->config->getPassword()
        ))->request();
        Log::info('登陆Nacos响应：' . json_encode($response));
        $this->token = new NacosToken(
            $response->getAccessToken(),
            $response->getTokenTtl() + time() - 10,
            $response->isGlobalAdmin()
        );
    }

    public function getAccessToken(): string
    {
        if (!$this->config->isEnableAuth()) return '';

        if (!$this->token) $this->refreshToken();
        if (!$this->token) return '';

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

    public function getConfig(): ?NacosConfig
    {
        return $this->config;
    }
}