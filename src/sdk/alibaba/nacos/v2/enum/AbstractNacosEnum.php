<?php

namespace think\sdk\alibaba\nacos\v2\enum;

class AbstractNacosEnum
{
    protected static array $map = [];

    public static function from($code): string
    {
        return array_key_exists($code, static::$map) ? static::$map[$code] ?: '' : '';
    }
}
