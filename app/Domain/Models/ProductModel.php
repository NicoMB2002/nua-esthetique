<?php

namespace App\Domain\Models;
use App\Helpers\Core\PDOService;

class ProductModel extends BaseModel
{

    public function __construct(PDOService $pdo_service) {
        parent::__construct($pdo_service);
    }



    public function getProducts(){
        $query = "Select * from Products";
        $products = $this->selectAll($query);
        return $products;
    }

    public function getOneProduct($id){
        $query = "Select * from Products where product_id = :product_id";
        $product = $this->selectOne($query,['product_id'=>$id]);
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
