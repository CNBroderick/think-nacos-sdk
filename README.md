ThinkPHP Nacos 2.x 扩展
===============

ThinkPHP Nacos 2.x 扩展

## 1. 安装

### 1.1 命令行部署
composer require topthink/think-nacos-sdk
> 还未发布，暂时无法使用

### 1.2 手动部署

composer.json 中添加如下配置

#### 1.2.1. 仓库
```json
{
  "repositories": [
    {
      "type": "path",
      "url": "path/to/think-nacos-sdk",
      "options": {
        "versions": {
          "topthink/think-nacos-sdk": "0.0.1"
        }
      }
    }
  ]
}
```

#### 1.2.2. 依赖
```json
{
  "require": {
    "topthink/think-nacos-sdk": "0.0.1"
  }
}
```

## 2. 配置

### 2.1. 自动注册
> ThinkPHP框架在应用初始化时

#### 2.1.1. 参考文档

[ThinkPHP 文档 -> 架构 -> 事件 -> 内置事件 ](https://doc.thinkphp.cn/v8_0/event.html)

#### 2.1.2. 正确填写相关配置 

在config/nacos.php 中正确填写服务器和Nacos的相关信息

#### 2.1.3. 在app/event.php中填写
```php
// 事件定义文件
return [
    // ......
    'listen'    => [
        'AppInit'  => [
            'think\sdk\alibaba\nacos\v2\Nacos', //推荐放到末尾
        ],
    ],
    // ......
];
```

### 2.2. 手动注册

#### 2.2.1. 通过HTTP注册

```php
public function register_nacos()
{
    // 设置用户永远执行
    set_time_limit(0);
    // 设置用户永不超时
    ini_set('max_execution_time', '0');
    // 设置用户中断时继续执行
    ignore_user_abort(true);

    // 获取本机内网IP
    $ip = gethostbyname(gethostname());

    $ip = $this->request->get('ip', $ip);
    $port = $this->request->get('port', 80);

    // 具体配置信息见下方

    return '已将' . $ip . ':' . $port . '注册到Nacos。';
}
```

#### 2.2.2. 当填写配置文件时
```php
$nacos = new \think\sdk\alibaba\nacos\v2\Nacos()
    ->register()    // 注册服务到Nacos
    ;
```

#### 2.2.3. 动态配置

```php
// 如需动态配置Nacos，请使用此方法获取
$config = new \think\sdk\alibaba\nacos\v2\config\NacosConfig::getInstance();
// 默认通过此方法获取本机内网IP
$config ->setServerIp(gethostbyname(gethostname()));
// 如监听端口非80，且配置文件未填写，则需要手动设置
$config ->setServerPort(8080);

$nacos = new \think\sdk\alibaba\nacos\v2\Nacos()
    ->register()    // 注册服务到Nacos
    ;
```

### 2.3. 监听配置更改

#### 2.3.1 配置监听事件
```php
\think\Event::listen(
    \think\sdk\alibaba\nacos\v2\event\NacosConfigChangeEvent::class, 
    function ($raw_config){
        dump('nacos config change', $raw_config);
    }
);
```

#### 2.3.2 在单独一个线程中执行
```php
$nacos = new \think\sdk\alibaba\nacos\v2\Nacos()
    ->listen()              // 开始监听（每秒查询更改）
    ->cancelListening()     // 当需要停止监听时，调用
    ;
```

启动方式：
> 可以在启动时，可以通过http调用一个地址来实现配置的加载。<br>
> 此接口需要设置不自动关闭，否则会在自动关闭时停止监听。<br>
> 此接口需要自行实现，不在本扩展内实现。

## 3. 目录结构

```yaml
-sdk:
    -alibaba:
        -nacos:
        -v2:
            -Nacos.php: 主类，用于注册服务器地址，监听配置更新
            -auth: 鉴权相关
            -config: 配置相关
            -enum: 枚举类
            -event: 事件类
            -request: # 请求类 https://nacos.io/zh-cn/docs/v2/guide/user/open-api.html
              -auth: 权限认证 https://nacos.io/zh-cn/docs/v2/guide/user/auth.html
              -cluster: 集群管理 
              -config: 配置管理
              -discovery: # 服务发现
                -client: 客户端相关
                -instance: 实例相关
                -service: 服务相关
                -system: 系统相关
              -loader: 连接负载管理
              -name_space: 命名空间
            -response: 全部响应数据类
            -util: 工具类
```

## 4. 其他

任何BUG或者建议，欢迎提交issue或者PR。