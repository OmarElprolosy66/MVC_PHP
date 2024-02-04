<?php
namespace MVC\Core;

use Dcblogdev\PdoWrapper\Database;

class model
{
    public static function db(): Database
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