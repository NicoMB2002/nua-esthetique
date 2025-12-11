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

            if(isset($request->getQueryParams()['search'])){
                 $data['products'] = $this->products_model->getProductsWithImagesSearch($request->getQueryParams()['search']);
            }else {
                 $data['products'] = $this->products_model->getProductsWithImages();
            }

        // return $this->redirect($request, $response, 'products.index');

        return $this->render($response, 'user/products.php', $data);
    }

    public function addItem(Request $request, Response $response, array $args):Response{

        $id = $request->getParsedBody()['id'];

        $item = $this->products_model->getProductById($id);
       $cart =  SessionManager::get('cart')?? [];
        if(isset($cart[$item['name']])){
            array_push($cart[$item['name']],$item);

        }else{
          $cart[$item['name']] = [$item];
        }




       SessionManager::set('cart',$cart);
        return $this->redirect($request, $response, 'user.products');
    }

        public function removeItem(Request $request, Response $response, array $args):Response{

        $name = $request->getParsedBody()['name'];
        $cart =  SessionManager::get('cart')?? [];
        unset($cart[$name]);
        SessionManager::set('cart',$cart);
        return $this->redirect($request, $response, 'user.products');
    }
}
