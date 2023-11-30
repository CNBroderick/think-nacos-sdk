ThinkPHP Nacos 2.x 扩展
===============

ThinkPHP Nacos 2.x 扩展

## 安装

composer require topthink/think-nacos-sdk

## 配置
```php
$nacos = new \think\sdk\alibaba\nacos\v2\Nacos();
// 服务器内网或公网地址，服务器端口。不要使用本机地址
$nacos ->register('10.0.0.1', '80');

// 可以通过以下方式更改配置，支持链式调用，最后调用saveConfig()方法保存配置
$nacos 
    ->getConfig()
    ->setHost('nacos.example.com')
    ->setPort(8848)
    ->saveConfig();

$shutdown = $nacos ->listen(function ($raw_config){
    // 配置更新回调
    // $raw_config 为原始配置，字符串格式，需要自行解析
    // 业务逻辑
}, 30000 /* 监听间隔，单位毫秒 */);
// 当需要停止监听时，调用
$shutdown();
```

启动方式：
> 可以在启动时，可以通过http调用一个地址来实现配置的加载。<br>
> 此接口需要设置不自动关闭，否则会在自动关闭时停止监听。<br>
> 此接口需要自行实现，不在本扩展内实现。

## 目录结构

```yaml
-sdk:
    -alibaba:
        -nacos:
        -v2:
            -Nacos.php: 主类，用于注册服务器地址，监听配置更新
            -auth: 鉴权相关
            -config: 配置相关
            -enum: 枚举类
            -request: 全部请求接口
            -response: 全部响应数据类
            -util: 工具类
```