<?php

namespace think\sdk\alibaba\nacos\v2\enum;

class AbstractNacosEnum
{
    protected static array $map = [];

    public static function from($code): string
    {
        return self::$map[$code] ?: '';
    }
}
