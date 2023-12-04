<?php

namespace think\sdk\alibaba\nacos\v2\response\config\history;

class NacosConfigHistoryListResponsePageItem
{
    private int $id;
    private int $lastId;
    private string $dataId;
    private string $group;
    private string $tenant;
    private string $appName;
    private string $md5;
    private string $content;
    private string $srcIp;
    private string $srcUser;
    private string $opType;
    private string $createdTime;
    private string $lastModifiedTime;

    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->id = $this->data['id'];
        $this->lastId = $this->data['lastId'];
        $this->dataId = $this->data['dataId'];
        $this->group = $this->data['group'];
        $this->tenant = $this->data['tenant'];
        $this->appName = $this->data['appName'];
        $this->md5 = $this->data['md5'];
        $this->content = $this->data['content'];
        $this->srcIp = $this->data['srcIp'];
        $this->srcUser = $this->data['srcUser'];
        $this->opType = $this->data['opType'];
        $this->createdTime = $this->data['createdTime'];
        $this->lastModifiedTime = $this->data['lastModifiedTime'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLastId(): int
    {
        return $this->lastId;
    }

    public function getDataId(): string
    {
        return $this->dataId;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function getTenant(): string
    {
        return $this->tenant;
    }

    public function getAppName(): string
    {
        return $this->appName;
    }

    public function getMd5(): string
    {
        return $this->md5;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getSrcIp(): string
    {
        return $this->srcIp;
    }

    public function getSrcUser(): string
    {
        return $this->srcUser;
    }

    public function getOpType(): string
    {
        return $this->opType;
    }

    public function getCreatedTime(): string
    {
        return $this->createdTime;
    }

    public function getLastModifiedTime(): string
    {
        return $this->lastModifiedTime;
    }

    public function getData(): array
    {
        return $this->data;
    }

}