# Aliyunsls for laravel



## 运行环境

- php `^7.0`

- Laravel `^6.0`

  

## 安装

1. 推荐使用composer安装，执行如下命令
```
composer require alfredlib/aliyunsls-for-laravel
```

2. 注册Laravel服务， 在config/app.php 添加

```php
'providers' => [
    // ...
    'Alfredlib\AliyunSls\AliyunSlsServiceProvider::class',
]
```
添加aliases配置

```php
'aliases' => [
    // ...
    'Sls' => Alfredlib\AliyunSls\Facades\Sls::class,
]

```

3. 发布资源，在config目录下生成一个aliyunsls.php文件
```
  php artisan vendor:publish --provider="Alfredlib\AliyunSls\AliyunSlsServiceProvider"
```
## 添加配置项
在config/aliyunsls.php 中添加配置，您也可以在.env文件中添加对应配置项

```PHP
return [
    'endpoint' => env('ALIYUN_SLS_ENDPOINT', ''),
    'access_key' => env('ALIYUN_SLS_ACCESS_KEY', ''),
    'access_secret' => env('ALIYUN_SLS_ACCESS_SECRET', ''),
    'project' => env('ALIYUN_SLS_PROJECT', ''),
    'default_logstore' => env('','test'),
]

```

## 使用举例
Sls Facade类提供了不同种日志级别写入函数：

```PHP
Sls::info();
Sls::warning();
Sls::error();
Sls::debug();

```

## 依赖SDK
Aliyun Log Service PHP SDK，API VERSION 0.6.1


### License ###

The code for Predis is distributed under the terms of the MIT license (see [LICENSE](LICENSE)).