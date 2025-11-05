<?php

namespace App\Controllers;

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use app\Helpers\SessionManager;


class ProductsController extends BaseController {

    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    //* Step 1) Add a route handler/request handler (controller method AKA a callback method)

    public function index(Request $request, Response $response, array $args) : Response {

        //! Process the request: we might need to interact with the model (change, pull records, etc.)
        //* Render a view (Or we can redirect the request to another view)

        $data = [];
        //*Write a key-value pair into the current user session:
        SessionManager::set('username', 'nicolas');

        return $this->render($response, 'admin/products/productsIndexView.php', $data);
    }
}
