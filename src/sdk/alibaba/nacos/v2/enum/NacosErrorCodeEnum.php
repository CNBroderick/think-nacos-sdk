<?php

namespace think\sdk\alibaba\nacos\v2\enum;

class NacosErrorCodeEnum extends AbstractNacosEnum
{
    protected static array $map = [
        400 => '客户端请求中的语法错误',
        403 => '没有权限',
        404 => '无法找到资源',
        500 => '服务器内部错误',
    ];
}
