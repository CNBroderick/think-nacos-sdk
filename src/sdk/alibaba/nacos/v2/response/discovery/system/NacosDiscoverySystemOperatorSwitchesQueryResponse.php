<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\system;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoverySystemOperatorSwitchesQueryResponse extends JsonNacosResponse
{
    private string $name;
    private $masters;
    private array $adWeightMap;
    private int $defaultPushCacheMillis;
    private int $clientBeatInterval;
    private int $defaultCacheMillis;
    private float $distroThreshold;
    private bool $healthCheckEnabled;
    private bool $distroEnabled;
    private bool $enableStandalone;
    private bool $pushEnabled;
    private int $checkTimes;
    private array $httpHealthParams;
    private array $tcpHealthParams;
    private array $mysqlHealthParams;
    private array $incrementalList;
    private int $serverStatusSynchronizationPeriodMillis;
    private int $serviceStatusSynchronizationPeriodMillis;
    private bool $disableAddIP;
    private bool $sendBeatOnly;
    private array $limitedUrlMap;
    private int $distroServerExpiredMillis;
    private string $pushGoVersion;
    private string $pushJavaVersion;
    private string $pushPythonVersion;
    private string $pushCVersion;
    private bool $enableAuthentication;
    private string $overriddenServerStatus;
    private bool $defaultInstanceEphemeral;
    private array $healthCheckWhiteList;
    private string $checksum;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->name = $this->data['name'];
        $this->masters = $this->data['masters'];
        $this->adWeightMap = $this->data['adWeightMap'];
        $this->defaultPushCacheMillis = $this->data['defaultPushCacheMillis'];
        $this->clientBeatInterval = $this->data['clientBeatInterval'];
        $this->defaultCacheMillis = $this->data['defaultCacheMillis'];
        $this->distroThreshold = $this->data['distroThreshold'];
        $this->healthCheckEnabled = $this->data['healthCheckEnabled'];
        $this->distroEnabled = $this->data['distroEnabled'];
        $this->enableStandalone = $this->data['enableStandalone'];
        $this->pushEnabled = $this->data['pushEnabled'];
        $this->checkTimes = $this->data['checkTimes'];
        $this->httpHealthParams = $this->data['httpHealthParams'];
        $this->tcpHealthParams = $this->data['tcpHealthParams'];
        $this->mysqlHealthParams = $this->data['mysqlHealthParams'];
        $this->incrementalList = $this->data['incrementalList'];
        $this->serverStatusSynchronizationPeriodMillis = $this->data['serverStatusSynchronizationPeriodMillis'];
        $this->serviceStatusSynchronizationPeriodMillis = $this->data['serviceStatusSynchronizationPeriodMillis'];
        $this->disableAddIP = $this->data['disableAddIP'];
        $this->sendBeatOnly = $this->data['sendBeatOnly'];
        $this->limitedUrlMap = $this->data['limitedUrlMap'];
        $this->distroServerExpiredMillis = $this->data['distroServerExpiredMillis'];
        $this->pushGoVersion = $this->data['pushGoVersion'];
        $this->pushJavaVersion = $this->data['pushJavaVersion'];
        $this->pushPythonVersion = $this->data['pushPythonVersion'];
        $this->pushCVersion = $this->data['pushCVersion'];
        $this->enableAuthentication = $this->data['enableAuthentication'];
        $this->overriddenServerStatus = $this->data['overriddenServerStatus'];
        $this->defaultInstanceEphemeral = $this->data['defaultInstanceEphemeral'];
        $this->healthCheckWhiteList = $this->data['healthCheckWhiteList'];
        $this->checksum = $this->data['checksum'];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMasters()
    {
        return $this->masters;
    }

    public function getAdWeightMap(): array
    {
        return $this->adWeightMap;
    }

    public function getDefaultPushCacheMillis(): int
    {
        return $this->defaultPushCacheMillis;
    }

    public function getClientBeatInterval(): int
    {
        return $this->clientBeatInterval;
    }

    public function getDefaultCacheMillis(): int
    {
        return $this->defaultCacheMillis;
    }

    public function getDistroThreshold(): float
    {
        return $this->distroThreshold;
    }

    public function isHealthCheckEnabled(): bool
    {
        return $this->healthCheckEnabled;
    }

    public function isDistroEnabled(): bool
    {
        return $this->distroEnabled;
    }

    public function isEnableStandalone(): bool
    {
        return $this->enableStandalone;
    }

    public function isPushEnabled(): bool
    {
        return $this->pushEnabled;
    }

    public function getCheckTimes(): int
    {
        return $this->checkTimes;
    }

    public function getHttpHealthParams(): array
    {
        return $this->httpHealthParams;
    }

    public function getTcpHealthParams(): array
    {
        return $this->tcpHealthParams;
    }

    public function getMysqlHealthParams(): array
    {
        return $this->mysqlHealthParams;
    }

    public function getIncrementalList(): array
    {
        return $this->incrementalList;
    }

    public function getServerStatusSynchronizationPeriodMillis(): int
    {
        return $this->serverStatusSynchronizationPeriodMillis;
    }

    public function getServiceStatusSynchronizationPeriodMillis(): int
    {
        return $this->serviceStatusSynchronizationPeriodMillis;
    }

    public function isDisableAddIP(): bool
    {
        return $this->disableAddIP;
    }

    public function isSendBeatOnly(): bool
    {
        return $this->sendBeatOnly;
    }

    public function getLimitedUrlMap(): array
    {
        return $this->limitedUrlMap;
    }

    public function getDistroServerExpiredMillis(): int
    {
        return $this->distroServerExpiredMillis;
    }

    public function getPushGoVersion(): string
    {
        return $this->pushGoVersion;
    }

    public function getPushJavaVersion(): string
    {
        return $this->pushJavaVersion;
    }

    public function getPushPythonVersion(): string
    {
        return $this->pushPythonVersion;
    }

    public function getPushCVersion(): string
    {
        return $this->pushCVersion;
    }

    public function isEnableAuthentication(): bool
    {
        return $this->enableAuthentication;
    }

    public function getOverriddenServerStatus(): string
    {
        return $this->overriddenServerStatus;
    }

    public function isDefaultInstanceEphemeral(): bool
    {
        return $this->defaultInstanceEphemeral;
    }

    public function getHealthCheckWhiteList(): array
    {
        return $this->healthCheckWhiteList;
    }

    public function getChecksum(): string
    {
        return $this->checksum;
    }

}