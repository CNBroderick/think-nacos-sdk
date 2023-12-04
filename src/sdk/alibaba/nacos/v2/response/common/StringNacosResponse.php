<?php

namespace think\sdk\alibaba\nacos\v2\response\common;

use think\sdk\alibaba\nacos\v2\response\AbstractNacosResponse;

class StringNacosResponse extends AbstractNacosResponse
{
    private string $data;

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        if (is_string($body)) $this->data = $body;
        else if ($body) $this->data = $body->__toString();
    }

    public function getData(): string
    {
        return $this->data;
    }

}