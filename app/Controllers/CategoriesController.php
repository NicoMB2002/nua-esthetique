<?php

namespace App\Controllers;

use App\Domain\Models\CategoriesModel;
use App\Domain\Models\ProductsModel;
use App\Helpers\FlashMessage;
use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CategoriesController extends BaseController
{
    public function __construct(Container $container, private CategoriesModel $categories_model, private ProductsModel $products_model)
    {
        parent::__construct($container);
    }

    /**
     * Display categories page
     */
    public function index(Request $request, Response $response, array $args): Response
    {
        $data["page_title"] = "Categories";
        $categories = $this->categories_model->getCategories();
        if (!$categories) {
            return $response->withStatus(401);
        }
        $data["data"] = [
            'title' => "List of Categories",
            'message' => 'Welcome to categories page',
            'categories' => $categories
        ];
        return $this->render($response, 'admin/categories/categoriesIndexView.php', $data);
    }
    public function show(Request $request, Response $response, array $args): Response
    {
        $categoryId = $args['category_id'] ?? 0;

        if ($categoryId === 0) {
            FlashMessage::error('Category ID is missing');
            return $this->redirect($request, $response, 'categories.index');
        }

        $category = $this->categories_model->getCategoriesId($categoryId);

        if (!$category) {
            FlashMessage::error('Category not found');
            return $this->redirect($request, $response, 'categories.index');
        }

        $products = $this->products_model->getProductsByCategory($categoryId);

        return $this->render($response, 'categoriesDetailsView.php', [
            'page_title' => $category['name'],
            'category'   => $category,
            'products'   => $products
        ]);
    }


    /**
     * Create Category
     */
    public function create(Request $request, Response $response, array $args): Response
    {
        $new_category_info = $request->getQueryParams();
        $category_name = $new_category_info["category_name"];
        $category_desc = $new_category_info["category_description"];
        $this->categories_model->createCategory($new_category_info);
        FlashMessage::success('New category created successfully');
        return $this->redirect($request, $response, 'categories.index');
    }

    /**
     * Edit Category
     */
    public function edit(Request $request, Response $response, array $args): Response
    {
        $category_id = $args["category_id"];
        $category = $this->categories_model->getCategoriesId($category_id);
        $data = [
            'category' => $category
        ];
        return $this->render($response, 'admin/categories/categoriesEditView.php', $data);
    }

    /**
     * Delete Category
     */
    public function update(Request $request, Response $response, array $args): Response
    {
        $category_info = $request->getParsedBody();
        $category_id = $category_info["category_id"];
        $this->categories_model->updateCategory($category_id, $category_info);
        FlashMessage::success('Category updated successfully!');
        return $this->redirect($request, $response, 'categories.index');
    }

    /**
     * Delete Category
     */
    public function delete(Request $request, Response $response, array $args): Response
    {
        $category_info = $request->getParsedBody();
        $category_id = $category_info["category_id"];
        $this->categories_model->deleteCategory($category_id);
        FlashMessage::success('Category has been successfully deleted');
        return $this->redirect($request, $response, 'categories.index');
    }
}
