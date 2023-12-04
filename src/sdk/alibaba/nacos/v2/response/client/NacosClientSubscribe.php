<?php

namespace think\sdk\alibaba\nacos\v2\response\client;

class NacosClientSubscribe
{

    /**
     * @var string 命名空间
     */
    private string $namespace;

    /**
     * @var string 分组名
     */
    private string $group;

    /**
     * @var string 服务名
     */
    private string $serviceName;

    /**
     * @var string 应用
     */
    private string $subscriberInfoApp;

    /**
     * @var string 客户端信息
     */
    private string $subscriberInfoAgent;

    /**
     * @var string 地址
     */
    private string $subscriberInfoAddr;

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function setNamespace(string $namespace): NacosClientSubscribe
    {
        $this->namespace = $namespace;
        return $this;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): NacosClientSubscribe
    {
        $this->group = $group;
        return $this;
    }

    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    public function setServiceName(string $serviceName): NacosClientSubscribe
    {
        $this->serviceName = $serviceName;
        return $this;
    }

    public function getSubscriberInfoApp(): string
    {
        return $this->subscriberInfoApp;
    }

    public function setSubscriberInfoApp(string $subscriberInfoApp): NacosClientSubscribe
    {
        $this->subscriberInfoApp = $subscriberInfoApp;
        return $this;
    }

    public function getSubscriberInfoAgent(): string
    {
        return $this->subscriberInfoAgent;
    }

    public function setSubscriberInfoAgent(string $subscriberInfoAgent): NacosClientSubscribe
    {
        $this->subscriberInfoAgent = $subscriberInfoAgent;
        return $this;
    }

    public function getSubscriberInfoAddr(): string
    {
        return $this->subscriberInfoAddr;
    }

    public function setSubscriberInfoAddr(string $subscriberInfoAddr): NacosClientSubscribe
    {
        $this->subscriberInfoAddr = $subscriberInfoAddr;
        return $this;
    }


}