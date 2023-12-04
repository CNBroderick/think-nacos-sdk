<?php

namespace think\sdk\alibaba\nacos\v2\response\common;

use think\sdk\alibaba\nacos\v2\response\AbstractNacosResponse;

class SuccessResultNacosResponse extends AbstractNacosResponse
{
    private string $data;

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->data = $body;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function isReturnSuccess()
    {
        return $this->data == 'success';
    }

}