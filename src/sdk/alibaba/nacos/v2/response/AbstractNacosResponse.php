<?php

namespace think\sdk\alibaba\nacos\v2\response;

use think\facade\Log;
use think\sdk\alibaba\nacos\v2\enum\NacosErrorCodeEnum;

abstract class AbstractNacosResponse
{
    protected bool $success;
    protected int $httpCode;
    protected string $message;
    protected array $response;
    protected string $body;

    public function __construct($response, $body)
    {
        $this->httpCode = $response['http_code'];
        $this->success = $this->httpCode == 200;
        $this->message = $this->success ? '' : 'think-nacos-sdk：请求失败：[' . $this->httpCode . ']' . (NacosErrorCodeEnum::from($this->httpCode ?: '未知错误'));
        $this->response = $response;
        $this->body = $body;
    }

    public function requireSuccess(): AbstractNacosResponse
    {
        if ($this->httpCode !== 200) {
            Log::error($this ->message . ' ' . $this->body);
            abort(500, $this->message);
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

    public function getResponse(): array
    {
        return $this->response;
    }

    public function getBody(): string
    {
        return $this->body;
    }

}