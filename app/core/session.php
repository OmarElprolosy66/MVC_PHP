<?php

namespace MVC\Core;

/**
 * Class Session
 * @package MVC\Core
 */
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
     * @param string $key The key of the session variable.
     * @param mixed $default The default value if the session variable is not set.
     *
     * @return mixed The value of the session variable.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Set a session variable.
     *
     * @param string $key The key of the session variable.
     * @param mixed $value The value to set.
     */
    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Delete a session variable.
     *
     * @param string $key The key of the session variable to delete.
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
