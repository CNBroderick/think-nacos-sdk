<?php

namespace think\sdk\alibaba\nacos\v2\response\common;

class BoolResultNacosResponse extends JsonNacosResponse
{

    public function isReturnTure(): bool
    {
        return !!$this->data;
    }

}