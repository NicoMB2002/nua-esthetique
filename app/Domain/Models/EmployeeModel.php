<?php

namespace App\Domain\Models;
use App\Helpers\Core\PDOService;

class EmployeeModel extends BaseModel
{

    public function __construct(PDOService $pdo_service) {
        parent::__construct($pdo_service);
    }



    public function getEmployees(){
        $query = "Select * from Employees";
        $employees = $this->selectAll($query);
        return $employees;
    }

    public function getOneEmployee($id){
        $query = "Select * from Employees where employee_id = :employee_id";
        $employee = $this->selectOne($query,['employee_id'=>$id]);
        return $employee;
    }

    public function insertEmployee($info = []){
    $query = "INSERT INTO employees(
                first_name,
                last_name,
                hire_date,
                date_of_birth,
                phone,
                email,
                address,
                postal_code,
                isAdmin
            )
        VALUES(
                :first_name,
                :last_name,
                :hire_date,
                :date_of_birth,
                :phone,
                :email,
                :address,
                :postal_code,
                :isAdmin
        )";

        $this->execute($query, $info);

    }

    public function deleteEmployee($id){
        $query = "Delete from Employees where employee_id = :employee_id";

        $this->execute($query,['employee_id'=>$id]);
    }

}
