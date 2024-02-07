<?php
namespace MVC\Controllers;

use MVC\Models\user;
use MVC\Core\Session;
use MVC\Core\controller;

class UserController extends controller
{
    public function __construct()
    {
        Session::start();
        $user = Session::get("user");

        if (empty($user)){
            echo "class is not accessible"; die;
        }
    }

    public function index()
    {
        echo "user";
    }
}