<?php

namespace think\sdk\alibaba\nacos\v2\response\config\history;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosConfigHistoryDetailResponse extends JsonNacosResponse
{
    /**
     * @var int 配置id
     */
    private int $id;
    /**
     * @var int 上次修改的配置id
     */
    private int $lastId;
    /**
     * @var string 配置名
     */
    private string $dataId;
    /**
     * @var string 配置分组
     */
    private string $group;
    /**
     * @var string 租户信息（命名空间）
     */
    private string $tenant;
    /**
     * @var string 应用名
     */
    private string $appName;
    /**
     * @var string 配置内容的md5值
     */
    private string $md5;
    /**
     * @var string 配置内容
     */
    private string $content;
    /**
     * @var string 源ip
     */
    private string $srcIp;
    /**
     * @var string 源用户
     */
    private string $srcUser;
    /**
     * @var string 操作类型
     */
    private string $opType;
    /**
     * @var string 创建时间
     */
    private string $createdTime;
    /**
     * @var string|mixed 上次修改时间
     */
    private string $lastModifiedTime;
    private string $encryptedDataKey;

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
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
        $this->encryptedDataKey = $this->data['encryptedDataKey'];
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

    public function getEncryptedDataKey(): string
    {
        return $this->encryptedDataKey;
    }

}