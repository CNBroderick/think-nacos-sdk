<?php

namespace think\sdk\alibaba\nacos\v2\config;

use think\facade\Cache;
use think\facade\Config;

class NacosConfig
{

    /** 启用Nacos */
    private bool $enable;

    /** 启用Nacos授权认证，如果启用，需要配置用户名和密码  */
    private bool $enableAuth;

    /** 项目名称 */
    private string $name;

    /** Nacos 主机地址  */
    private string $host;

    /** Nacos 端口  */
    private int $port;

    /** 使用https访问  */
    private bool $https;

    /** 用户名 */
    private string $username;

    /** 密码  */
    private string $password;

    /** 命名空间  */
    private string $namespace;

    /** 环境信息  */
    private string $env;

    /** 配置ID */
    private string $dataId;

    /** 配置分组  */
    private string $group;

    /** 日志级别  */
    private string $logLevel;

    /** 启用调试模式  */
    private bool $isDebug;

    private static $instance;

    /**
     * @return mixed
     */
    public static function getInstance(): NacosConfig
    {
        if (!self::$instance) {
            self::$instance = new NacosConfig();
            self::$instance->reload();
            $cacheKey = self::$instance->getCacheKey('config');
            $config = json_decode(Cache::get($cacheKey), true);
            if ($config) self::$instance->reload($config);
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    public function reload($config = null): void
    {
        $config = $config ?: Config::get('nacos');

        $this->enable = $config['enable'] ?: false;
        $this->enableAuth = $config['enableAuth'] ?: true;
        $this->name = $config['name'] ?: 'think-nacos';
        $this->host = $config['host'] ?: '127.0.0.1';
        $this->port = intval($config['port']) ?: 8848;
        $this->https = !!$config['https'];
        $this->username = $config['username'] ?: 'nacos';
        $this->password = $config['password'] ?: 'nacos';
        $this->namespace = $config['namespace'] ?: '';
        $this->env = $config['env'] ?: '';
        $this->dataId = $config['dataId'] ?: '';
        $this->group = $config['group'] ?: 'DEFAULT_GROUP';
        $this->logLevel = $config['logLevel'] ?: 'INFO';
        $this->isDebug = $config['isDebug'] ?: false;

    }

    public function getCacheKey($type): string
    {
        $identity = implode('-', [
            $this->name,
            $this->username,
            $this->namespace,
            $this->env,
            $this->dataId,
            $this->group,
        ]);
        return 'think-nacos-' . $type . '-' . $identity;
    }

    public function saveConfig()
    {
        $cacheKey = $this->getCacheKey('config');
        Cache::set($cacheKey, $this->toJson(), 30 * 24 * 60 * 60);
    }

    public function toJson()
    {
        return json_encode([
            'enable' => $this->enable,
            'enableAuth' => $this->enableAuth,
            'name' => $this->name,
            'host' => $this->host,
            'port' => $this->port,
            'https' => $this->https,
            'username' => $this->username,
            'password' => $this->password,
            'namespace' => $this->namespace,
            'env' => $this->env,
            'dataId' => $this->dataId,
            'group' => $this->group,
            'logLevel' => $this->logLevel,
            'isDebug' => $this->isDebug,
        ]);
    }

    public static function fromJson($json): NacosConfig
    {
        $config = json_decode($json, true);
        $nacosConfig = new NacosConfig();
        $nacosConfig->reload($config);
        return $nacosConfig;
    }

    // 以下是自动生成的getter和setter方法

    public function isEnable(): bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): NacosConfig
    {
        $this->enable = $enable;
        return $this;
    }

    public function isEnableAuth(): bool
    {
        return $this->enableAuth;
    }

    public function setEnableAuth(bool $enableAuth): NacosConfig
    {
        $this->enableAuth = $enableAuth;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): NacosConfig
    {
        $this->name = $name;
        return $this;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setHost(string $host): NacosConfig
    {
        $this->host = $host;
        return $this;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function setPort(int $port): NacosConfig
    {
        $this->port = $port;
        return $this;
    }

    public function isHttps(): bool
    {
        return $this->https;
    }

    public function setHttps(bool $https): NacosConfig
    {
        $this->https = $https;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): NacosConfig
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): NacosConfig
    {
        $this->password = $password;
        return $this;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function setNamespace(string $namespace): NacosConfig
    {
        $this->namespace = $namespace;
        return $this;
    }

    public function getEnv(): string
    {
        return $this->env;
    }

    public function setEnv(string $env): NacosConfig
    {
        $this->env = $env;
        return $this;
    }

    public function getDataId(): string
    {
        return $this->dataId;
    }

    public function setDataId(string $dataId): NacosConfig
    {
        $this->dataId = $dataId;
        return $this;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): NacosConfig
    {
        $this->group = $group;
        return $this;
    }

    public function getLogLevel(): string
    {
        return $this->logLevel;
    }

    public function setLogLevel(string $logLevel): NacosConfig
    {
        $this->logLevel = $logLevel;
        return $this;
    }

    public function isDebug(): bool
    {
        return $this->isDebug;
    }

    public function setIsDebug(bool $isDebug): NacosConfig
    {
        $this->isDebug = $isDebug;
        return $this;
    }


}