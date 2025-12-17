<?php

namespace App\Domain\Models;

use App\Helpers\Core\PDOService;

class CustomerModel extends BaseModel
{

    public function __construct(PDOService $pdo_service)
    {
        parent::__construct($pdo_service);
    }

    public function getCustomers()
    {
        $query = "Select * from users where role = 'customer'";
        $customers = $this->selectAll($query);
        return $customers;
    }

    public function getOneCustomer($id)
    {
        $query = "Select * from users where id = :customer_id";
        $customer = $this->selectOne($query, ['customer_id' => $id]);
        return $customer;
    }

    public function insertCustomer($info = [])
    {
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

    //Update user information
    public function updateCustomer(int $id, array $userInfo)
    {
        // dd($id);
        // dd($userInfo); Naming was changed
        $sql = "UPDATE users SET first_name = :first_name,
        last_name = :last_name, phone_number = :phone, email = :email, address = :address, postal_code = :postal_code
        WHERE id = :id";

        $updateUser = $this->execute($sql, [
            'id' => $id,
            'first_name' => $userInfo['user_fname'],
            'last_name' => $userInfo['user_lname'],
            'phone' => $userInfo['user_phone'],
            'email' => $userInfo['user_email'],
            'address' => $userInfo['user_address'],
            'postal_code' => $userInfo['user_postal_code']
        ]);
        return $updateUser;
    }

    public function deleteCustomer($id)
    {
        $query = "Delete from Customers where customer_id = :customer_id";

        $this->execute($query, ['customer_id' => $id]);
    }
}
