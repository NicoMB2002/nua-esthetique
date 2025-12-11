<?php

namespace App\Domain\Models;
use App\Helpers\Core\PDOService;

class ProductsModel extends BaseModel
{

    private $products_table = "products";

    public function __construct(PDOService $pdo_service) {
        parent::__construct($pdo_service);
    }



    public function getProducts(){
        $query = "Select p.product_id as product_id, p.name as name, p.price as price, p.description as description, c.name as category_name, p.quantity as quantity from Products p  left join Categories c on p.category_id = c.id";
        $products = $this->selectAll($query);
        return $products;
    }

        public function getProductsWithImages(){
        $query = "SELECT
                    p.product_id AS product_id,
                    p.name AS name,
                    p.price AS price,
                    p.description AS description,
                    c.name AS category_name,
                    p.quantity AS quantity,
                    pi.file_path AS path
                FROM
                    Products p
                LEFT JOIN Categories c ON
                    p.category_id = c.id
                LEFT JOIN product_images pi ON
                    p.product_id = pi.product_id";
        $products = $this->selectAll($query);
        return $products;
    }

    public function getProductById(int $product_id) : mixed {

        $sql = "SELECT * FROM {$this->products_table} WHERE product_id = :product_id";
        $product = $this->selectOne($sql, ["product_id" => $product_id]);
        return $product;
    }

    public function insertProduct($info = []){
    $query = "INSERT INTO products(
            price,
            quantity,
            InStock,
            description,
            isBulk
        )
        VALUES(
            :price,
            :quantity,
            :InStock,
            :description,
            :isBulk
        )";

        $this->execute($query, $info);

    }


        public function updateProduct($info = []){
    $query = "UPDATE  products SET
            `category_id` = :category,
            `name` = :name,
            `price` = :price,
            `quantity` = :quantity,
            `description` = :description
            where product_id = :product_id
        ";

        $this->execute($query, $info);

    }

    public function deleteProduct($id){
        $query = "Delete from Products where product_id = :product_id";

        $this->execute($query,['product_id'=>$id]);
    }


}
