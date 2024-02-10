<?php
declare(strict_types=1);

namespace MVC\Core;

class Controller
{
    /**
     * Render a view.
     *
     * @param string $path
     * @param array|null $params
     */
    public function view(string $path, ?array $params = null): void
    {
        if (!empty($params))
            extract($params);

        $viewFilePath = VIEWS . $path;

        if (file_exists($viewFilePath)) {
            require $viewFilePath;
        } else {
            throw new \InvalidArgumentException("View file not found: {$viewFilePath}");
        }
    }
}
