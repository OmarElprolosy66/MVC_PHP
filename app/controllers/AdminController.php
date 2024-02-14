<?php

declare(strict_types=1);

namespace MVC\Controllers;

use MVC\Core\Session;
use MVC\Core\Controller;

/**
 * Class AdminController
 * @package MVC\Controllers
 */
class AdminController extends Controller
{
    /**
     * AdminController constructor.
     * Checks and authorizes access.
     */
    public function __construct()
    {
        $this->authorizeAccess(); // Checking access
    }

    /**
     * Authorize access to the AdminController.
     */
    private function authorizeAccess(): void
    {
        Session::start();
        $user = Session::get("user");

        if (empty($user)) {
            echo "Access denied!";
            exit;
        }
    }

    /**
     * Display the index page for admin.
     */
    public function index(): void
    {
        $this->view("admin/index.php", ["title" => "Admin"]);
    }
}
