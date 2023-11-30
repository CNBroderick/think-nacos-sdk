<?php

namespace think\sdk\alibaba\nacos\v2\response\discovery\system;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosDiscoverySystemOperatorMetricsQueryResponse extends JsonNacosResponse
{

    private int $serviceCount;
    private float $load;
    private float $mem;
    private int $responsibleServiceCount;
    private int $instanceCount;
    private float $cpu;
    private string $status;
    private float $responsibleInstanceCount;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->serviceCount = $this->data['serviceCount'];
        $this->load = $this->data['load'];
        $this->mem = $this->data['mem'];
        $this->responsibleServiceCount = $this->data['responsibleServiceCount'];
        $this->instanceCount = $this->data['instanceCount'];
        $this->cpu = $this->data['cpu'];
        $this->status = $this->data['status'];
        $this->responsibleInstanceCount = $this->data['responsibleInstanceCount'];
    }

    public function getServiceCount(): int
    {
        return $this->serviceCount;
    }

    public function getLoad(): float
    {
        return $this->load;
    }

    public function getMem(): float
    {
        return $this->mem;
    }

    public function getResponsibleServiceCount(): int
    {
        return $this->responsibleServiceCount;
    }

    public function getInstanceCount(): int
    {
        return $this->instanceCount;
    }

    public function getCpu(): float
    {
        return $this->cpu;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getResponsibleInstanceCount(): float
    {
        return $this->responsibleInstanceCount;
    }


}