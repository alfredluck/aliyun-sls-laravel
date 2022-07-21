<?php

namespace Alfredlib\AliyunSls;


class Registry
{
    private static $_value = [];

    /**
     * 注册数据
     *
     * @param string $key
     * @param $value
     * @return mixed
     */
    public static function set(string $key, $value)
    {
        return self::$_value[self::envKey($key)] = $value;
    }

    /**
     * 获取注册的数据
     *
     * @param string $key
     * @return mixed|null
     */
    public static function get(string $key)
    {
        return self::$_value[self::envKey($key)] ?? null;
    }


    /**
     * 判断当前key是否已被注册
     *
     * @param string $key
     * @return bool
     */
    public static function isExist(string $key): bool
    {
        return isset(self::$_value[self::envKey($key)]) ? true : false;
    }

    /**
     * 获取当前开发环境下的前缀
     * @param $key
     * @return string
     */
    public static function envKey($key): string
    {
        $env_prefix = config('app.env');
        return $env_prefix . '_' . $key;
    }
}
