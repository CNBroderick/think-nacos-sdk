<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | Nacos 2.x设置
// +----------------------------------------------------------------------

return [

    // 以下是服务配置

    // 服务监听IP，不能填写127.0.0.1的本机地址。如果为空，则通过`gethostbyname(gethostname())`获取
    'server_ip' => gethostbyname(gethostname()),
    // 服务监听端口
    'server_port' => 80,
    /**
     * 用于将服务注册到Nacos所需的服务扩展参数，
     * @see \think\sdk\alibaba\nacos\v2\request\discovery\instance\ns\NacosDiscoveryInstanceRegistrationRequest::$optionalParams SDK源代码：请求类实现
     * @see https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html 官方文档：服务发现->注册实例
     */
    'server_params' =>  [
        'weight' => 1,
        'enabled' => true,
        'healthy' => true,
        'metadata' => [
            'preserved.register.source' => \think\sdk\alibaba\nacos\v2\Nacos::getUserAgent()
        ],
    ],

    // 以下是Nacos配置

    // 启用Nacos
    'enable' => false,
    // 启用Nacos授权认证，如果启用，需要配置用户名和密码
    'enableAuth' => true,
    // 项目名称
    'name' => 'thinkphp-nacos-client',
    // Nacos 主机地址
    'host' => '127.0.0.1',
    // Nacos 服务端口
    'port' => 8848,
    // 使用https访问
    'https' => false,
    // 用户名
    'username' => 'nacos',
    // 密码
    'password' => 'nacos',
    // 命名空间
    'namespace' => '',
    // 环境信息
    'env' => '',
    // 配置ID
    'dataId' => '',
    // 配置分组
    'group' => 'DEFAULT_GROUP',

    // 日志级别
    'logLevel' => 'info',
    // 启用调试模式
    'isDebug' => false,
];