<?php
declare(strict_types=1);

namespace MVC\Core;

class Helpers
{
    /**
     * Redirect to a specified path.
     *
     * @param string $path
     */
    public static function redirect(string $path): void
    {
        // Validate the path (optional)
        if (empty($path)) {
            throw new \InvalidArgumentException("Invalid redirection path");
        }

        // Perform the redirection
        header("Location: " . DOMAIN_NAME . $path);

        // Ensure that no further code is executed after the header is sent
        exit();
    }
}
