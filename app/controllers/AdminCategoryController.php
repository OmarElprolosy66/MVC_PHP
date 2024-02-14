<?php

declare(strict_types=1);

namespace MVC\Controllers;

use MVC\Core\Helpers;
use MVC\Core\Session;
use MVC\Models\Category;
use MVC\Core\Controller;
use Respect\Validation\Validator as v;

/**
 * Class AdminCategoryController
 * @package MVC\Controllers
 */
class AdminCategoryController extends Controller
{
    /** @var mixed|null $m_user */
    private $m_user;

    /** @var mixed|null $m_category */
    private $m_category;

    /**
     * AdminCategoryController constructor.
     */
    public function __construct()
    {
        Session::start();

        $this->m_user = Session::get("user");
        $this->m_category = new Category();

        if (empty($this->m_user)) {
            echo "class is not accessible";
            die;
        }
    }

    /**
     * Display all categories.
     */
    public function index(): void
    {
        $data = $this->m_category->getAllCategories();

        $this->view("admin/category.php", ["title" => "Category", "data" => $data]);
    }

    /**
     * Display the add category form.
     */
    public function add(): void
    {
        $this->view("admin/addcategory.php", ["title" => "Add category"]);
    }

    /**
     * Handle adding a new category.
     */
    public function postadd(): void
    {
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $icon = isset($_POST["icon"]) ? $_POST["icon"] : "";
        $img  = isset($_FILES["img"]) ? $_FILES["img"] : "";

        $nameValidator = V::notEmpty();
        $iconValidator = V::notEmpty();
        $imgValidator  = v::notEmpty();

        if (
            $nameValidator->validate($name) &&
            $iconValidator->validate($icon) &&
            $imgValidator->validate($img)
        ) {
            move_uploaded_file($img["tmp_name"], "img/" . $img["name"]);

            $data = [
                "name"    => $name,
                "icon"    => $icon,
                "img"     => $img["name"],
                "user_id" => $this->m_user->id,
            ];

            $this->m_category->addCategory($data);

            Helpers::redirect("/AdminCategory/index");

            exit();
        } else {
            echo "validation failed";

            echo "<pre>";
            print_r($nameValidator->reportError($name));
            print_r($iconValidator->reportError($icon));
            print_r($imgValidator->reportError($img));
            echo "</pre>";
        }
    }

    /**
     * Delete a category.
     *
     * @param string $id The category ID.
     */
    public function delete(string $id): void
    {
        $this->m_category->deleteCategory($id);

        Helpers::redirect("/AdminCategory/index");

        exit();
    }

    /**
     * Display the update category form.
     *
     * @param string $id The category ID.
     */
    public function update(string $id): void
    {
        $data = $this->m_category->getCategoryById($id);

        $this->view("admin/updatecategory.php", ["title" => "Update", "data" => $data]);
    }

    /**
     * Handle updating a category.
     */
    public function postupdate(): void
    {
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $icon = isset($_POST["icon"]) ? $_POST["icon"] : "";
        $img  = isset($_FILES["img"]) ? $_FILES["img"] : "";
        $id   = isset($_POST["id"])   ? $_POST["id"]   : "";

        $nameValidator = V::notEmpty();
        $iconValidator = V::notEmpty();
        $imgValidator  = v::notEmpty();

        if (
            $nameValidator->validate($name) &&
            $iconValidator->validate($icon) &&
            $imgValidator->validate($img)
        ) {

            if (!empty($_FILES["img"]["name"])) {
                move_uploaded_file($img["tmp_name"], "img/" . $img["name"]);

                $data = [
                    "name"    => $name,
                    "icon"    => $icon,
                    "img"     => $img["name"],
                    "user_id" => $this->m_user->id,
                ];
            } else {
                $data = [
                    "name"    => $name,
                    "icon"    => $icon,
                    "user_id" => $this->m_user->id,
                ];
            }


            $this->m_category->updateCategory($data, $id);

            Helpers::redirect("/AdminCategory/index");
        } else {
            echo "validation failed";

            echo "<pre>";
            print_r($nameValidator->reportError($name));
            print_r($iconValidator->reportError($icon));
            print_r($imgValidator->reportError($img));
            echo "</pre>";
        }

        Helpers::redirect("/AdminCategory/index");

        exit();
    }
}
