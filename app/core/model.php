<?php

declare(strict_types=1);

namespace MVC\Core;

use Dcblogdev\PdoWrapper\Database;

/**
 * Class Model
 * @package MVC\Core
 */
class Model
{
    /**
     * Get a new instance of the database.
     *
     * @return Database The database instance.
     */
    public static function db(): Database
    {
        $dbConfig = require CONFIG . "database.php";

        $options = [
            //required
            'username' => $dbConfig["user_name"] ?? null,
            'database' => $dbConfig["database_name"] ?? null,
            //optional
            'password' => $dbConfig["password"] ?? null,
            'type'     => $dbConfig["database_type"] ?? null,
            'charset'  => $dbConfig["charset"] ?? null,
            'host'     => $dbConfig["server"] ?? null,
            'port'     => $dbConfig["port"] ?? null,
        ];

        return new Database($options);
    }
}
