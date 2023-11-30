<?php

namespace think\sdk\alibaba\nacos\v2\response\common;

use think\sdk\alibaba\nacos\v2\response\AbstractNacosResponse;

class JsonNacosResponse extends AbstractNacosResponse
{
    protected $data;

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->data = json_decode($body, true);
    }

    public function getData()
    {
        return $this->data;
    }

}