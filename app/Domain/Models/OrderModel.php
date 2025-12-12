<?php

namespace App\Domain\Models;
use App\Helpers\Core\PDOService;

class OrderModel extends BaseModel
{

    public function __construct(PDOService $pdo_service) {
        parent::__construct($pdo_service);
    }

    public function getOrders(){
        $query = "Select * from Orders o left join users u on o.customer_id = u.id";
        $orders = $this->selectAll($query);
        return $orders;
    }

     public function getOrdersById($id){
        $query = "Select * from Orders o left join users u on o.customer_id = u.id where o.customer_id = :id";
        $orders = $this->selectAll($query,['id'=>$id]);
        return $orders;
    }
         public function getOrderProducts($id){
        $query = "Select p.name as product_name, c.name as category_name, p.description as description, p.price as price, op.quantity as quantity  from Orders o left join orders_products op on o.order_id = op.order_id
            left join products p  on p.product_id = op.product_id
            left join categories c  on p.category_id = c.id
            where op.order_id = :id";
        $orders = $this->selectAll($query,['id'=>$id]);
        return $orders;
    }

    public function getOneOrder($id){
        $query = "Select * from Orders where order_id = :order_id";
        $order = $this->selectOne($query,['order_id'=>$id]);
        return $order;
    }

    public function insertOrder($info = []){
    $query = "INSERT INTO orders(
                customer_id,
                tracking_number
            )
            VALUES(
                :customer_id,
                :tracking_number
            )";

        $this->execute($query, $info);

        return $this->lastInsertId();;

    }

        public function insertProducts_Order($info = []){
    $query = "INSERT INTO orders_products(
                product_id,
                order_id,
                quantity
            )
            VALUES(
                :product_id,
                :order_id,
                :quantity
            )";

        $this->execute($query, $info);

    }

    public function deleteOrder($id){
        $query = "Delete from Orders where order_id = :order_id";

        $this->execute($query,['order_id'=>$id]);
    }

}
