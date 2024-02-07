<?php
declare(strict_types=1);

namespace MVC\Core;

use Dcblogdev\PdoWrapper\Database;

class model
{
    public static function db(): Database
    {
        $options = [
            //required
            'username' => USER_NAME,
            'database' => DATABASE_NAME,
            //optional
            'password' => PASSWORD,
            'type'     => DATABASE_TYPE,
            'charset'  => CHARSET,
            'host'     => SERVER,
            'port'     => PORT
        ];

        $db = new Database($options);

        return $db;
    }
}