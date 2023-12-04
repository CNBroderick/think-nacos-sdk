<?php

namespace think\sdk\alibaba\nacos\v2\response\loader;

use think\sdk\alibaba\nacos\v2\response\common\JsonNacosResponse;

class NacosLoaderCurrentResponse extends JsonNacosResponse
{
    private array $map = [];

    public function __construct($response, $body)
    {
        parent::__construct($response, $body);

        foreach ($this->data as $key => $value) {
            $this->map[$key] = new NacosLoaderCurrent($value);
        }
    }

    public function getMap(): array
    {
        return $this->map;
    }
}