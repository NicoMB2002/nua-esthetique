<?php

namespace App\Domain\Models;
use App\Helpers\Core\PDOService;

class OrderModel extends BaseModel
{

    public function __construct(PDOService $pdo_service) {
        parent::__construct($pdo_service);
    }

    public function getOrders(){
        $query = "Select * from Orders";
        $orders = $this->selectAll($query);
        return $orders;
    }

    public function getOneOrder($id){
        $query = "Select * from Orders where order_id = :order_id";
        $order = $this->selectOne($query,['order_id'=>$id]);
        return $order;
    }

    public function insertOrder($info = []){
    $query = "INSERT INTO orders(
                order_id,
                customer_id,
                tracking_number,
                order_date
            )
            VALUES(
                :order_id,
                :customer_id,
                :tracking_number,
                :order_date
            )";

        $this->execute($query, $info);

    }

    public function deleteOrder($id){
        $query = "Delete from Orders where order_id = :order_id";

        $this->execute($query,['order_id'=>$id]);
    }

}
