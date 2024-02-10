<?php
declare(strict_types=1);

namespace MVC\Controllers;

use MVC\Core\Helpers;
use MVC\Models\user;
use MVC\Core\Session;
use MVC\Core\controller;
use Respect\Validation\Validator as v;

class HomeController extends controller
{
    public function index(): void
    {
        $this->view("home/index.php", ["title" => "Home index"]);
    }

    public function single(): void
    {
        $this->view("home/single.php", ["title" => "single"]);
    }
}
