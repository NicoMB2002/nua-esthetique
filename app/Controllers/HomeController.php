<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Domain\Models\CategoriesModel;
use App\Domain\Models\OrderModel;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Helpers\SessionManager;
use App\Domain\Models\ProductsModel;
class HomeController extends BaseController
{
    //NOTE: Passing the entire container violates the Dependency Inversion Principle and creates a service locator anti-pattern.
    // However, it is a simple and effective way to pass the container to the controller given the small scope of the application and the fact that this application is to be used in a classroom setting where students are not yet familiar with the Dependency Inversion Principle

    public function __construct(Container $container, private ProductsModel $products_model, private CategoriesModel $categories_model, private OrderModel $order_model)
    {
        parent::__construct($container);
    }


    /**
     * Display customer Home page
     */
    public function index(Request $request, Response $response, array $args): Response {
        $data = ['title'=> 'HomePage'];
        return $this->render($response, 'user/dashboard.php', $data);
    public function index(Request $request, Response $response, array $args): Response {

        $categories = $this->categories_model->getCategories();
        $products   = $this->products_model->getProducts();

        $data = [
            'title'      => 'Home',
            'products'   => $products,
            'categories' => $categories
        ];

        // return $this->redirect($request, $response, 'products.index');

        return $this->render($response, 'homeView.php', $data);
    }

    /**
     * Display customer product page
     */
    public function products(Request $request, Response $response, array $args): Response {
        $data = ['title'=> 'HomePage'];
        if(isset($request->getQueryParams()['search'])){
            $data['products'] = $this->products_model->getProductsWithImagesSearch($request->getQueryParams()['search']);
        }else {
            $data['products'] = $this->products_model->getProductsWithImages();
        }
         return $this->render($response, 'user/products.php', $data);

    public function products(Request $request, Response $response, array $args): Response
    {
        $categories = $this->categories_model->getCategories();

        if (isset($request->getQueryParams()['search'])) {
            $products = $this->products_model
                ->getProductsWithImagesSearch($request->getQueryParams()['search']);
        } else {
            $products = $this->products_model->getProductsWithImages();
        }

        $data = [
            'title'      => 'HomePage',
            'products'   => $products,
            'categories' => $categories
        ];

        return $this->render($response, 'homeView.php', $data);
    }

    /**
     * Add Item to cart
     */
    public function addItem(Request $request, Response $response, array $args):Response{
        $id = $request->getParsedBody()['id'];
        $item = $this->products_model->getProductById((int) $id);
        $cart =  SessionManager::get('cart')?? [];
        if(isset($cart[$item['name']])){
            array_push($cart[$item['name']],$item);
        }else{
          $cart[$item['name']] = [$item];
        }
        SessionManager::set('cart',$cart);
        return $this->redirect($request, $response, 'user.products');
    }

    /**
     * Remove item from cart
     */
     public function removeItem(Request $request, Response $response, array $args):Response{
        $name = $request->getParsedBody()['name'];
        $cart =  SessionManager::get('cart')?? [];
        unset($cart[$name]);
        SessionManager::set('cart',$cart);
        return $this->redirect($request, $response, 'user.products');
    }

    /**
     * Display error page
     */
    public function error(Request $request, Response $response, array $args): Response
    {
        return $this->render($response, 'errorView.php');
    }

    /**
     * Display checkout page
     */
    public function checkout(Request $request, Response $response, array $args): Response
    {
        $data = ['title'=>'Checkout'];
        return $this->render($response, 'user/checkout.php',$data);
    }

    /**
     * Create order
     */
    public function createOrder(Request $request, Response $response, array $args): Response{
        $cart = SessionManager::get('cart');
        $orderID = $this->order_model->insertOrder([
            'customer_id'=>SessionManager::get('user_id'),
            'tracking_number'=> random_int(1000000,9999999)
        ]);
        foreach ($cart as $item) {
        $this->order_model->insertProducts_Order([
            'product_id' => $item[0]['product_id'],
            'order_id' => $orderID,
            'quantity' => count($item)
        ]);
        }
        return $this->redirect($request,$response,'user.products');
    }


    public function customerOrders(Request $request, Response $response, array $args): Response {
        $data = ['title'=> 'Orders Page'];
        $data['orders'] = $this->order_model->getOrdersById(SessionManager::get('user_id'));
        return $this->render($response, 'user/orders.php', $data);
    }

     /**
     * Display order details
     */
    public function customerOrderDetails(Request $request, Response $response, array $args): Response {
        $data = ['title'=> 'Orders Page'];
        $data['order_id'] = $args['id'];
        $data['products'] = $this->order_model->getOrderProducts($args['id']);
        return $this->render($response, 'user/orderDetails.php', $data);
    }
}
