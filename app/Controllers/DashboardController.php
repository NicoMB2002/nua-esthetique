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

    //*step1 add route handler/request handler (controller) method aka a callback method
    public function index(Request $request, Response $response, array $args): Response {
        //! to process the request: we might need to interact with the model.
        //*change, pull data/records, etc.
        //* render view or redirect the $req to another view
        $data = [];
        SessionManager::set('user_id', 321);
        SessionManager::set('username', 'john');

        // return $this->redirect($request, $response, 'products.index');

        return $this->render($response, 'admin/dashboardView.php', $data);
    }

}
