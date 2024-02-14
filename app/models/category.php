<?php

declare(strict_types=1);

namespace MVC\Models;

use MVC\Core\Model;

/**
 * Class Category
 * @package MVC\Models
 */
class Category extends Model
{
    /**
     * Get all categories.
     *
     * @return object The categories.
     */
    public function getAllCategories()
    {
        return Model::db()->rows("SELECT * FROM `category`");
    }

    /**
     * Get category by ID.
     *
     * @param string $id The category ID.
     * @return object|null The category if found, otherwise null.
     */
    public function getCategoryById(string $id)
    {
        return Model::db()->row("SELECT * FROM `category` WHERE `id` = ?", [$id]);
    }

    /**
     * Add a new category.
     *
     * @param array $data The category data.
     * @return void
     */
    public function addCategory(array $data): void
    {
        Model::db()->insert("category", $data);
    }

    /**
     * Update category.
     *
     * @param array $data The category data.
     * @param string $id The category ID.
     * @return void
     */
    public function updateCategory(array $data, string $id): void
    {
        Model::db()->update("category", $data, ['id' => $id]);
    }

    /**
     * Delete category.
     *
     * @param string $id The category ID.
     * @return void
     */
    public function deleteCategory(string $id): void
    {
        Model::db()->delete("category", ['id' => $id]);
    }
}
