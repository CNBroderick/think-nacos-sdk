<?php

namespace think\sdk\alibaba\nacos\v2\response\name_space;

class NacosNamespaceData
{

    /**
     * @var string 命名空间ID
     */
    private string $namespace;
    /**
     * @var string 命名空间名称
     */
    private string $namespaceShowName;
    /**
     * @var string 命名空间描述
     */
    private string $namespaceDesc;
    /**
     * @var int 命名空间的容量
     */
    private int $quota;
    /**
     * @var int 命名空间下的配置数量
     */
    private int $configCount;

    /**
     * @var int 命名空间分为3种类型，0- 全局命名空间 1 - 默认私有命名空间 2- 自定义命名空间
     */
    private int $type;

    public function __construct($data)
    {
        $this->namespace = $data['namespace'];
        $this->namespaceShowName = $data['namespaceShowName'];
        $this->namespaceDesc = $data['namespaceDesc'];
        $this->quota = $data['quota'];
        $this->configCount = $data['configCount'];
        $this->type = $data['type'];
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getNamespaceShowName(): string
    {
        return $this->namespaceShowName;
    }

    public function getQuota(): int
    {
        return $this->quota;
    }

    public function getConfigCount(): int
    {
        return $this->configCount;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getNamespaceDesc(): string
    {
        return $this->namespaceDesc;
    }


}