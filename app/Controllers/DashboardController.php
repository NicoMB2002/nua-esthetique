<?php

namespace App\Controllers;

use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DashboardController extends BaseController
{
    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    /**
     * Display admin dashboard page
     */
    public function index(Request $request, Response $response, array $args): Response {
        $data = [];
        // return $this->redirect($request, $response, 'products.index');
        return $this->render($response, 'admin/dashboardView.php', $data);
    }

}
