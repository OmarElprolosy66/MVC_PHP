<?php

declare(strict_types=1);

namespace MVC\Controllers;

use MVC\Core\Controller;

/**
 * Class HomeController
 * @package MVC\Controllers
 */
class HomeController extends Controller
{
    /**
     * Display the index page.
     */
    public function index(): void
    {
        $this->view("home/index.php", ["title" => "Home Index"]);
    }

    /**
     * Display the single page.
     */
    public function single(): void
    {
        $this->view("home/single.php", ["title" => "Single Page"]);
    }
}
