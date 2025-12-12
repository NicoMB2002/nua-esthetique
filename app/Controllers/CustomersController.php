<?php

namespace App\Controllers;

use App\Domain\Models\CustomerModel;
use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CustomersController extends BaseController
{

    public function __construct(Container $container, private CustomerModel $customer_model)
    {
        parent::__construct($container);
    }


        public function index(Request $request, Response $response, array $args): Response {


            $data = ['title'=> 'Customer Page'];

            $data['customers'] = $this->customer_model->getCustomers();

        return $this->render($response, 'admin/customers/customersIndexView.php', $data);
    }
}
