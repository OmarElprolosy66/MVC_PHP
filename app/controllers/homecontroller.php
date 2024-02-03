<?php
namespace MVC\Controllers;

use MVC\Core\controller;

class homecontroller extends controller
{
    public function index(): void
    {
        $this->view("home/index", ["title" => "Home index"]);
    }
}
