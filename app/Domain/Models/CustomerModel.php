<?php

namespace App\Domain\Models;
use App\Helpers\Core\PDOService;

class CustomerModel extends BaseModel
{

    public function __construct(PDOService $pdo_service) {
        parent::__construct($pdo_service);
    }

    public function getCustomers(){
        $query = "Select * from Customers";
        $customers = $this->selectAll($query);
        return $customers;
    }

    public function getOneCustomer($id){
        $query = "Select * from Customers where customer_id = :customer_id";
        $customer = $this->selectOne($query,['customer_id'=>$id]);
        return $customer;
    }

    public function insertCustomer($info = []){
    $query = "INSERT INTO `customers`(
            first_name,
            last_name,
            phone,
            address,
            postal_code,
            date_of_birth,
            receive_notification,
            email
        )
        VALUES(
            :first_name,
            :last_name,
            :phone,
            :address,
            :postal_code,
            :date_of_birth,
            :receive_notification,
            :email
        )";

        $this->execute($query, $info);

    }

    public function deleteCustomer($id){
        $query = "Delete from Customers where customer_id = :customer_id";

        $this->execute($query,['customer_id'=>$id]);
    }


}
