<?php

namespace think\sdk\alibaba\nacos\v2\response\name_space;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosNamespaceQueryResponse extends JsonNacosResponse
{

    private int $code;

    /**
     * 对应返回数据中的message字段，父类中的$message代表根据请求响应的HTTP状态码推断出的错误信息
     * @var array|mixed
     */
    private string $response_message;

    /**
     * 对应返回数据中的data字段，父类中的$data代表整个返回数据
     * @var array|mixed
     */
    private array $data_list;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->code = $this->data['code'];
        $this->response_message = $this->data['message'];
        $this->data_list = [];
        foreach ($this->data['data'] as $item) {
            $this->data[] = new NacosNamespaceQueryResponseData($item);
        }
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getResponseMessage(): string
    {
        return $this->response_message;
    }

    public function getDataList(): array
    {
        return $this->data_list;
    }


}