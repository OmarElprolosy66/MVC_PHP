<?php

declare(strict_types=1);

namespace MVC\Models;

use MVC\Core\Model;
use SensitiveParameter;

/**
 * Class User
 * @package MVC\Models
 */
class User extends Model
{
    /**
     * Get all users.
     *
     * @return object The users.
     */
    public function getAllUsers()
    {
        return Model::db()->rows("SELECT * FROM `user`");
    }

    /**
     * Get user by email and password.
     *
     * @param string $email The user's email.
     * @param string $password The user's password.
     * @return object|null The user if found, otherwise null.
     */
    public function getUser(string $email, #[SensitiveParameter] string $password): ?object
    {
        $query = "SELECT * FROM `user` WHERE `email` = :email AND `password` = :password";
        $params = [
            'email'    => $email,
            'password' => $password,
        ];

        return Model::db()->row($query, $params);
    }
}
