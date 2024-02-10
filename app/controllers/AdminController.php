<?php
declare(strict_types=1);

namespace MVC\Controllers;

use MVC\Core\Session;
use MVC\Core\controller;

class AdminController extends Controller
{
    public function __construct()
    {
        Session::start();
        $user = Session::get("user");

        if (empty($user)) {
            echo "class is not accessible";
            die;
        }
    }

    public function index()
    {
        $this->view("admin/index.php", ["title" => "Admin"]);
    }
}