<?php

namespace think\sdk\alibaba\nacos\v2\response;

use think\sdk\alibaba\nacos\v2\enum\NacosErrorCodeEnum;

abstract class AbstractNacosResponse
{
    protected bool $success;
    protected int $httpCode;
    protected string $message;
    protected string $response;
    protected string $body;

    public function __construct($response, $body)
    {
        $this->httpCode = $response['http_code'];
        $this->success = $this->httpCode == 200;
        $this->message = 'think-nacos-sdk：请求失败：[' . $response['http_code'] . ']' . (NacosErrorCodeEnum::from($response['http_code'] ?: '未知错误'));
        $this->response = $response;
        $this->body = $body;
    }

    public function requireSuccess(): AbstractNacosResponse
    {
        if ($this -> httpCode !== 200) {
            abort(500, 'think-nacos-sdk：' . $this -> message);
        }
        return $this;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getResponse(): string
    {
        return $this->response;
    }

    public function getBody(): string
    {
        return $this->body;
    }

}