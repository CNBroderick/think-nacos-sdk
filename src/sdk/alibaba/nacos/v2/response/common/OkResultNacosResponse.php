<?php

namespace think\sdk\alibaba\nacos\v2\response\common;

class OkResultNacosResponse extends StringNacosResponse
{
    private bool $result;

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->result = $this->httpCode === 200 && $this->body === 'ok';
    }

    public function isReturnOk(): bool
    {
        return $this->result;
    }

}