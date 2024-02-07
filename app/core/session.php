<?php
namespace MVC\Core;

class Session
{
    /**
     * Start the session.
     */
    public static function start(): void
    {
        @session_start();
    }

    /**
     * Get a session variable value.
     *
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Set a session variable.
     *
     * @param string $key
     * @param mixed $value
     */
    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Delete a session variable.
     *
     * @param string $key
     */
    public static function delete(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * Clear all session variables.
     */
    public static function clear(): void
    {
        $_SESSION = [];
    }

    /**
     * Destroy the session.
     */
    public static function destroy(): void
    {
        @session_destroy();
    }
}
