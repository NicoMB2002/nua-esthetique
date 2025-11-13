<?php

namespace App\Domain\Models;

use App\Helpers\Core\PDOService;

class CategoriesModel extends BaseModel
{

    private $categories_table = "categories";

    public function __construct(PDOService $db_service)
    {
        parent::__construct($db_service);
    }

    /**
     * Fetches the list of categories
     *
     * @return mixed
     */
    public function getCategories(): mixed
    {
        $sql = "SELECT * FROM {$this->categories_table} ";
        $categories = $this->selectALl($sql);
        return $categories;
    }

    /**
     * Fetches single category information
     * @return array
     */
    public function getCategoriesId(int $category_id): mixed
    {
        $sql = "SELECT * FROM {$this->categories_table} WHERE id = :id";
        $category = $this->selectOne($sql, ['id' => $category_id]);
        return $category;
    }

    public function getAll(): array
    {

        $sql = "SELECT * FROM {$this->categories_table}";
        return $this->selectAll($sql);
    }

    public function createCategory(array $category_info): int
    {
        $sql = "INSERT INTO {$this->categories_table} (name, description, created_at) VALUES (:name, :description, :created_at)";
        $nowDateTime = date('Y-m-d H:i:s');

        $createdCategory = $this->execute($sql, [
            'name' => $category_info['category_name'],
            'description' => $category_info['category_description'],
            'created_at' => $nowDateTime
        ]);
        return $createdCategory;
    }
    public function updateCategory(int $category_id, array $category_info): int
    {
        $sql = "UPDATE {$this->categories_table} SET name = :name, description = :description WHERE id = :id";

        $updatedCategory = $this->execute($sql, [
            'id' => $category_id,
            'name' => $category_info['category_name'],
            'description' => $category_info['category_description'],
        ]);
        return $updatedCategory;
    }

    public function deleteCategory(int $category_id): int
    {
        $sql = "DELETE FROM {$this->categories_table} WHERE id = :id";

        $deletedCategory = $this->execute($sql, ['id' => $category_id,]);
        return $deletedCategory;
    }
}
