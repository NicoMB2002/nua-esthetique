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
        $query = "Select p.product_id as product_id, p.promotion_percentage as promotion, p.name as name, p.price as price, p.description as description, c.name as category_name, p.quantity as quantity from Products p  left join Categories c on p.category_id = c.id";
        $products = $this->selectAll($query);
        return $products;
    }

        public function getProductByID($id){
        $query = "Select p.product_id as product_id, p.promotion_percentage as promotion, p.name as name, p.price as price, p.description as description, c.name as category_name, c.id as category_id, p.quantity as quantity from Products p  left join Categories c on p.category_id = c.id where p.product_id = :product_id";
        $products = $this->selectOne($query,['product_id'=>$id]);
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
                    p.promotion_percentage as promotion,
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

        public function getPromotionsWithImages(){
        $query = "SELECT
                    p.product_id AS product_id,
                    p.name AS name,
                    p.price AS price,
                    p.description AS description,
                    c.name AS category_name,
                    p.quantity AS quantity,
                    p.promotion_percentage as promotion,
                    pi.file_path AS path
                FROM
                    Products p
                LEFT JOIN Categories c ON
                    p.category_id = c.id
                LEFT JOIN product_images pi ON
                    p.product_id = pi.product_id
                WHERE p.promotion_percentage > 0";
        $products = $this->selectAll($query);
        return $products;
    }

    public function getImageForProduct(int $productId): ?string
    {
        $query = "SELECT file_path
            FROM product_images
            WHERE product_id = :product_id
            LIMIT 1";

        $result = $this->selectOne($query, ['product_id' => $productId]);

        return $result['file_path'] ?? null;
    }



            public function getProductsWithImagesSearch(string $search){
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
                    p.product_id = pi.product_id where p.name like CONCAT('%', :search ,'%')";

        $products = $this->selectAll($query, ['search'=>$search]);
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
                    p.product_id = pi.product_id where p.description like CONCAT('%', :search ,'%')";

        $products = $products + $this->selectAll($query, ['search'=>$search]);
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
                    p.product_id = pi.product_id where c.name like CONCAT('%', :search ,'%')";

        $products = $products + $this->selectAll($query, ['search'=>$search]);

        return $products;
    }


    public function insertProduct(array $info,$filename){
    $query = "INSERT INTO products(
            name,
            category_id,
            price,
            quantity,
            description
        )
        VALUES(
            :name,
            :category,
            :price,
            :quantity,
            :description
        )";

        $this->execute($query, $info);

        $query = "INSERT INTO product_images(
            product_id,
            file_path
        )
        VALUES(
            :product_id,
            :file_path
        )";

        $this->execute($query, [ 'product_id'=> $this->lastInsertId(),
                                'file_path' => 'public/assets/images/'.$filename]);

    }


        public function updateProduct($info = []){
    $query = "UPDATE  products SET
            `category_id` = :category,
            `name` = :name,
            `price` = :price,
            `quantity` = :quantity,
            `description` = :description,
            `promotion_percentage` = :promotion
            where product_id = :product_id
        ";

        $this->execute($query, $info);

    }

    public function deleteProduct($id){
        $query = "Delete from Products where product_id = :product_id";

        $this->execute($query,['product_id'=>$id]);
    }


}
