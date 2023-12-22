<?php

namespace think\sdk\alibaba\nacos\v2\response\common;

use think\facade\Log;
use think\sdk\alibaba\nacos\v2\enum\NacosErrorCodeEnum;
use think\sdk\alibaba\nacos\v2\response\AbstractNacosResponse;

class JsonNacosResponse extends AbstractNacosResponse
{
    protected int $code;
    protected string $message;
    protected $data;

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $res = json_decode($body, true);
        if ($res) {
            $this->code = $res['code'] ?? 0;
            $this->success = $this->httpCode == 200 && $this->code === 0;
            $this->message = $this->success ? '' : 'think-nacos-sdk：请求失败：[' . $this->httpCode . ']' . (NacosErrorCodeEnum::from($this->httpCode ?: $res['message']));
            $this->data = $res['data'] ?? null;
        } else {
            Log::error('think-nacos-sdk:JsonNacosResponse:解析请求内容失败。' . $body);
        }
    }

    public function getData()
    {
        return $this->data;
    }

}