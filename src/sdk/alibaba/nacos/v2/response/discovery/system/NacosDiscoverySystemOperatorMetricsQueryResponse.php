<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\system;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoverySystemOperatorMetricsQueryResponse extends JsonNacosResponse
{

    /**
     * @var string 系统状态
     */
    private string $status;

    /**
     * @var int 服务数量
     */
    private int $serviceCount;

    /**
     * @var int 实例数量
     */
    private int $instanceCount;

    /**
     * @var int 订阅数量
     */
    private int $subscribeCount;

    /**
     * @var int Raft通知任务数量
     */
    private int $raftNotifyTaskCount;

    /**
     * @var int
     */
    private int $responsibleServiceCount;

    /**
     * @var int
     */
    private int $responsibleInstanceCount;

    /**
     * @var int 客户端数量
     */
    private int $clientCount;

    /**
     * @var int 连接数量
     */
    private int $connectionBasedClientCount;

    /**
     * @var int 临时客户端数量
     */
    private int $ephemeralIpPortClientCount;

    /**
     * @var int 持久客户端数量
     */
    private int $persistentIpPortClientCount;

    /**
     * @var int
     */
    private int $responsibleClientCount;

    /**
     * @var float cpu使用率
     */
    private float $cpu;

    /**
     * @var float 负载
     */
    private float $load;

    /**
     * @var float 内存使用率
     */
    private float $mem;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->status = $this->data['status'];
        $this->serviceCount = $this->data['serviceCount'];
        $this->instanceCount = $this->data['instanceCount'];
        $this->subscribeCount = $this->data['subscribeCount'];
        $this->raftNotifyTaskCount = $this->data['raftNotifyTaskCount'];
        $this->responsibleServiceCount = $this->data['responsibleServiceCount'];
        $this->responsibleInstanceCount = $this->data['responsibleInstanceCount'];
        $this->clientCount = $this->data['clientCount'];
        $this->connectionBasedClientCount = $this->data['connectionBasedClientCount'];
        $this->ephemeralIpPortClientCount = $this->data['ephemeralIpPortClientCount'];
        $this->persistentIpPortClientCount = $this->data['persistentIpPortClientCount'];
        $this->responsibleClientCount = $this->data['responsibleClientCount'];
        $this->cpu = $this->data['cpu'];
        $this->load = $this->data['load'];
        $this->mem = $this->data['mem'];
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getServiceCount(): int
    {
        return $this->serviceCount;
    }

    public function getInstanceCount(): int
    {
        return $this->instanceCount;
    }

    public function getSubscribeCount(): int
    {
        return $this->subscribeCount;
    }

    public function getRaftNotifyTaskCount(): int
    {
        return $this->raftNotifyTaskCount;
    }

    public function getResponsibleServiceCount(): int
    {
        return $this->responsibleServiceCount;
    }

    public function getResponsibleInstanceCount(): int
    {
        return $this->responsibleInstanceCount;
    }

    public function getClientCount(): int
    {
        return $this->clientCount;
    }

    public function getConnectionBasedClientCount(): int
    {
        return $this->connectionBasedClientCount;
    }

    public function getEphemeralIpPortClientCount(): int
    {
        return $this->ephemeralIpPortClientCount;
    }

    public function getPersistentIpPortClientCount(): int
    {
        return $this->persistentIpPortClientCount;
    }

    public function getResponsibleClientCount(): int
    {
        return $this->responsibleClientCount;
    }

    public function getCpu(): float
    {
        return $this->cpu;
    }

    public function getLoad(): float
    {
        return $this->load;
    }

    public function getMem(): float
    {
        return $this->mem;
    }

}