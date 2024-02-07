<?php
namespace MVC\Models;

use MVC\Core\model;

class user extends model
{
    public function getAllUsers()
    {
        return model::db()->rows("SELECT * FROM `user`");
    }

    public function getUser(string $email, string $password): object
    {
        $query = "SELECT * FROM `user` WHERE `email` = :email AND `password` = :password";
        $params = [
            'email' => $email,
            'password' => $password,
        ];

        return model::db()->row($query, $params);
    }
}