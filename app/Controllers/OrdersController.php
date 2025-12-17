<?php

namespace App\Controllers;
use App\Domain\Models\OrderModel;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Helpers\SessionManager;
use App\Domain\Models\ProductsModel;
class OrdersController extends BaseController
{

    public function __construct(Container $container, private ProductsModel $products_model,private OrderModel $order_model)
    {
        parent::__construct($container);
    }

    /**
     * Display Admin orders page
     */
    public function index(Request $request, Response $response, array $args): Response {

        $data = ['title'=> 'Orders Page'];
        $data['orders'] = $this->order_model->getOrders();
        return $this->render($response, 'admin/orders/ordersIndexView.php', $data);
    }


    public function delete(Request $request, Response $response, array $args): Response {

        $rows =  $this->order_model->deleteOrder($args['order_id']);
        return $this->redirect($request, $response,"orders.index");
    }
}
