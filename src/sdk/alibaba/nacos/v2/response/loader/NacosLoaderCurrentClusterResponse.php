<?php

namespace think\sdk\alibaba\nacos\v2\response\loader;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosLoaderCurrentClusterResponse extends JsonNacosResponse
{
    /**
     * @var int $total 当前集群节点数
     */
    private int $total;

    /**
     * @var int $min 最小负载值
     */
    private int $min;

    /**
     * @var int $avg 平均负载值
     */
    private int $avg;

    /**
     * @var int $max 最大负载值
     */
    private int $max;

    /**
     * @var int $memberCount 当前节点的成员数
     */
    private int $memberCount;

    /**
     * @var int $metricsCount 负载信息数量
     */
    private int $metricsCount;

    /**
     * @var float $threshold 负载阈值。阈值的计算公式为：平均负载值 * 1.1
     */
    private float $threshold;

    /**
     * @var array $detail 包含每个节点的详细负载信息
     */
    private array $detail;

    /**
     * @var bool $completed 表示是否已完成负载信息的收集，如果为 true，则表示所有节点的负载信息均已收集，否则为 false
     */
    private bool $completed;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);

        $this->total = $this->data['total'];
        $this->min = $this->data['min'];
        $this->avg = $this->data['avg'];
        $this->max = $this->data['max'];
        $this->memberCount = $this->data['memberCount'];
        $this->metricsCount = $this->data['metricsCount'];
        $this->threshold = $this->data['threshold'];
        $this->detail = $this->data['detail'];
        $this->completed = $this->data['completed'];
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getMin(): int
    {
        return $this->min;
    }

    public function getAvg(): int
    {
        return $this->avg;
    }

    public function getMax(): int
    {
        return $this->max;
    }

    public function getMemberCount(): int
    {
        return $this->memberCount;
    }

    public function getMetricsCount(): int
    {
        return $this->metricsCount;
    }

    public function getThreshold(): float
    {
        return $this->threshold;
    }

    public function getDetail(): array
    {
        return $this->detail;
    }

    public function isCompleted(): bool
    {
        return $this->completed;
    }


}