<?php

namespace think\sdk\alibaba\nacos\v2\response\cluster;

class NacosClusterNode
{

    /**
     * @var string 节点IP地址
     */
    private string $ip;

    /**
     * @var int 节点端口
     */
    private int $port;

    /**
     * @var string 节点状态
     */
    private string $state;

    /**
     * @var array 节点扩展信息
     */
    private array $extendInfo;

    /**
     * @var string 节点地址（IP:port）
     */
    private string $address;

    /**
     * @var int 失败访问次数
     */
    private int $failAccessCnt;

    /**
     * @var array 节点能力
     */
    private array $abilities;

    public function __construct($data)
    {
        $this->ip = $data['ip'];
        $this->port = $data['port'];
        $this->state = $data['state'];
        $this->extendInfo = $data['extendInfo'];
        $this->address = $data['address'];
        $this->failAccessCnt = $data['failAccessCnt'];
        $this->abilities = $data['abilities'];
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getExtendInfo(): array
    {
        return $this->extendInfo;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getFailAccessCnt(): int
    {
        return $this->failAccessCnt;
    }

    public function getAbilities(): array
    {
        return $this->abilities;
    }

}