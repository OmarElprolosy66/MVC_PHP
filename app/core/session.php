<?php
namespace MVC\Core;

class Session
{
    public static function start(): void
    {
        @session_start();
    }

    public static function get($key, $default = null): mixed
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    public static function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function delete($key): void
    {
        unset($_SESSION[$key]);
    }

    public static function clear(): void
    {
        $_SESSION = array();
    }

    public static function destroy(): void
    {
        @session_destroy();
    }
}