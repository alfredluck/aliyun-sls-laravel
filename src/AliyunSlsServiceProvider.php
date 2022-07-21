<?php

namespace Alfredlib\AliyunSls;

use Illuminate\Support\ServiceProvider;

class AliyunSlsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('AliyunSls', function ($app) {
            return new AliyunLogger($app['session'], $app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/aliyunsls.php' => config_path('aliyunsls.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }

    public function provides()
    {
        return [AliyunLogger::class];
    }
}
