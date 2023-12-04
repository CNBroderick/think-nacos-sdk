<?php

namespace think\sdk\alibaba\nacos\v2\response\loader;

class NacosLoaderCurrent
{

    /**
     * @var bool 是否监控
     */
    private bool $traced;

    /**
     * @var array 能力表
     */
    private array $abilityTable;

    /**
     * @var array 元信息
     */
    private array $metaInfo;

    /**
     * @var int 是否连接
     */
    private int $connected;

    /**
     * @var array 标签
     */
    private array $labels;

    public function __construct(array $data)
    {
        $this->traced = $data['traced'];
        $this->abilityTable = $data['abilityTable'];
        $this->metaInfo = $data['metaInfo'];
        $this->connected = $data['connected'];
        $this->labels = $data['labels'];
    }

    public function isTraced(): bool
    {
        return $this->traced;
    }

    public function getAbilityTable(): array
    {
        return $this->abilityTable;
    }

    public function getMetaInfo(): array
    {
        return $this->metaInfo;
    }

    public function getConnected(): int
    {
        return $this->connected;
    }

    public function getLabels(): array
    {
        return $this->labels;
    }



}