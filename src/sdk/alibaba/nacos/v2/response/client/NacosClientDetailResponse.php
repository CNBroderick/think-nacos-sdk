<?php

namespace think\sdk\alibaba\nacos\v2\response\client;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosClientDetailResponse extends JsonNacosResponse
{

    /**
     * @var string 客户端id
     */
    private string $clientId;

    /**
     * @var bool 是否为临时实例
     */
    private bool $ephemeral;

    /**
     * @var int 上次更新时间
     */
    private int $lastUpdatedTime;

    /**
     * @var string 客户端类型
     */
    private string $clientType;

    /**
     * @var string 客户端IP
     */
    private string $clientIp;

    /**
     * @var string 客户端端口
     */
    private string $clientPort;

    /**
     * 只有当clientType为connection时，会显示connectType，appName和appName字段
     * @var string 连接类型
     */
    private string $connectType;

    /**
     * @var string 应用名
     */
    private string $appName;

    /**
     * @var string 客户端版本
     */
    private string $Version;

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->clientId = $this->data['clientId'];
        $this->ephemeral = $this->data['ephemeral'];
        $this->lastUpdatedTime = $this->data['lastUpdatedTime'];
        $this->clientType = $this->data['clientType'];
        $this->clientIp = $this->data['clientIp'];
        $this->clientPort = $this->data['clientPort'];
        $this->connectType = $this->data['connectType'];
        $this->appName = $this->data['appName'];
        $this->Version = $this->data['Version'];
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function isEphemeral(): bool
    {
        return $this->ephemeral;
    }

    public function getLastUpdatedTime(): int
    {
        return $this->lastUpdatedTime;
    }

    public function getClientType(): string
    {
        return $this->clientType;
    }

    public function getClientIp(): string
    {
        return $this->clientIp;
    }

    public function getClientPort(): string
    {
        return $this->clientPort;
    }

    public function getConnectType(): string
    {
        return $this->connectType;
    }

    public function getAppName(): string
    {
        return $this->appName;
    }

    public function getVersion(): string
    {
        return $this->Version;
    }
}