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
     * Fetches the list of categories from the DB.
     * @return array
     */
    public function getAll(): array {

        $sql = "SELECT * FROM {$this->categories_table} ";
        return $this->selectAll($sql);
    }

}
