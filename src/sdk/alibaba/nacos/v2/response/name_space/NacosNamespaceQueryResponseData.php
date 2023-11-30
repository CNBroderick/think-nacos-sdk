<?php

namespace think\sdk\alibaba\nacos\v2\response\name_space;

class NacosNamespaceQueryResponseData
{
    private string $namespace;
    private string $namespaceShowName;
    private int $quota;
    private int $configCount;
    private int $type;

    public function __construct($data)
    {
        $this->namespace = $data['namespace'];
        $this->namespaceShowName = $data['namespaceShowName'];
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


}