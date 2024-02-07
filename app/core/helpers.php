<?php
declare(strict_types=1);

namespace MVC\Core;

class Helpers
{
    public static function redirect(string $path): void
    {
        header("Location: " . DOMAIN_NAME . $path);
    }
}