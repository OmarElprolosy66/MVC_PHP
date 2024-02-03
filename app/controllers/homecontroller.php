<?php
namespace MVC\Controllers;

use MVC\Core\controller;

class homecontroller extends controller
{
    public function index(): void
    {
        // database connection example
        $data = $this->db()->rows("SELECT * FROM `user`"); // fetch each row as an object

        $this->view("home/index", ["title" => "Home index", "data" => $data]);
    }
}
