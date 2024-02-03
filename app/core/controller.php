<?php
namespace MVC\Core;

use Dcblogdev\PdoWrapper\Database;

class controller
{
    public function view($path, $params = null): void
    {
        if (!empty($params))
            extract($params);

        require_once VIEWS . $path . ".php";
    }

    public function db(): Database
    {
        $options = [
            //required
            'username' => 'root',
            'database' => 'proone',
            //optional
            'password' => '',
            'type' => 'mysql',
            'charset' => 'utf8',
            'host' => 'localhost',
            'port' => '3306'
        ];

        $db = new Database($options);

        return $db;
    }
}