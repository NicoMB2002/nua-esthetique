<?php

namespace App\Controllers;

use App\Domain\Models\CategoriesModel;
use App\Domain\Models\ProductsModel;
use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Helpers\FlashMessage;


class ProductsController extends BaseController
{
    public function __construct(Container $container, private ProductsModel $products_model, private CategoriesModel $categories_model)
    {
        parent::__construct($container);
    }

    /**
     * Display products page
     */
    public function index(Request $request, Response $response, array $args): Response
    {
        $products = $this->products_model->getProducts();
        $data = [
            'title' => 'List of Products',
            'message' => 'Welcome to the home page',
            'products' => $products
        ];
        return $this->render($response, 'admin/products/productsIndexView.php', $data);
    }

    public function show(Request $request, Response $response, array $args): Response {
        return $response;
    }
    public function create(Request $request, Response $response, array $args): Response {
        return $response;
    }

    /**
     * Display edit product page
     */
    public function edit(Request $request, Response $response, array $args): Response {
        $product_id = $args['product_id'];
        $product = $this->products_model->getProductById($product_id);
        $categories = $this->categories_model->getAll();
        $data = [
            'page_title' => 'Edit Product Details',
            'product' => $product,
            'categories' => $categories
        ];
        return $this->render($response, 'admin/products/productsEditView.php', $data);
    }

    /**
     * update product
     */
    public function update(Request $request, Response $response, array $args): Response {
        $product_info = $request->getParsedBody();
        $this->products_model->updateProduct($product_info);
        FlashMessage::success('Update Successful');
        return $this->redirect($request, $response, 'products.index');
    }

    public function delete(Request $request, Response $response, array $args): Response {
        return $response;
    }

}
