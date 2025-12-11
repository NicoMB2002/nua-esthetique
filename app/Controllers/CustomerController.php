<?php

namespace App\Controllers;

use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\Models\ProductsModel;

class CustomerController extends BaseController
{

    public function __construct(Container $container, private ProductsModel $products_model)
    {
        parent::__construct($container);
    }


        public function index(Request $request, Response $response, array $args): Response {


            $data = ['title'=> 'HomePage'];

        // return $this->redirect($request, $response, 'products.index');

        return $this->render($response, 'user/dashboard.php', $data);
    }


    public function products(Request $request, Response $response, array $args): Response {


            $data = ['title'=> 'HomePage'];
            $data['products'] = $this->products_model->getProductsWithImages();

        // return $this->redirect($request, $response, 'products.index');

        return $this->render($response, 'user/products.php', $data);
    }
}
