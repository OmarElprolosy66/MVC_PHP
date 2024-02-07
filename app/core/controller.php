<?php
declare(strict_types=1);

namespace MVC\Core;

class controller
{
    public function view($path, $params = null): void
    {
        if (!empty($params))
            extract($params);

        require_once VIEWS . $path . ".php";
    }
}