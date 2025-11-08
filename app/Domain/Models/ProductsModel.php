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
        $query = "Select * from Products";
        $products = $this->selectAll($query);
        return $products;
    }

    public function getProductById(int $product_id) : mixed {

        $sql = "SELECT * FROM {$this->products_table} WHERE id = :product_id";
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

    public function deleteProduct($id){
        $query = "Delete from Products where product_id = :product_id";

        $this->execute($query,['product_id'=>$id]);
    }


}
