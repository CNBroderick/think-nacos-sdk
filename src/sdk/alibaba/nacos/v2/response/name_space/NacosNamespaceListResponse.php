<?php

namespace think\sdk\alibaba\nacos\v2\response\name_space;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosNamespaceListResponse extends JsonNacosResponse
{
    /**
     * 对应返回数据中的data字段，父类中的$data代表整个返回数据
     * @var array|mixed
     */
    private array $list;


    public function __construct($response, $body)
    {
        parent::__construct($response, $body);
        $this->list = [];
        foreach ($this->data['data'] as $item) {
            $this->data[] = new NacosNamespaceData($item);
        }
    }

    public function getList(): array
    {
        return $this->list;
    }

}