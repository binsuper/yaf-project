<?php

use Gino\Yaf\Kernel\App;

if (!function_exists('storage_path')) {

    function storage_path(string $name = '') {
        $path = 'storage';
        if ($name) {
            $path .= DIRECTORY_SEPARATOR . $name;
        }
        return App::path($path);
    }

}

if (!function_exists('app_path')) {

    function app_path(string $name = '') {
        $path = 'app';
        if ($name) {
            $path .= DIRECTORY_SEPARATOR . $name;
        }
        return App::path($path);
    }

}

if (!function_exists('config')) {

    /**
     * @param string|null $key
     * @param null $def
     * @return mixed
     */
    function config(?string $key = null, $def = null) {
        return App::config()->get($key, $def);
    }

}

if (!function_exists('env')) {

    /**
     * @param string|null $key
     * @param null $def
     * @return array|mixed|null
     */
    function env(?string $key = null, $def = null) {
        if (is_null($key)) return $_ENV ?? null;
        return $_ENV[$key] ?? $def;
    }

}

if (!function_exists('__')) {

    /**
     * 语言翻译入口，预留
     *
     * @param string $text
     * @return string
     */
    function __(string $text): string {
        return $text;
    }

}