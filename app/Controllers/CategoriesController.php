<?php

namespace App\Controllers;

use App\Domain\Models\CategoriesModel;
use App\Helpers\FlashMessage;
use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CategoriesController extends BaseController
{
    public function __construct(Container $container, private CategoriesModel $categories_model)
    {
        parent::__construct($container);
    }

    public function index(Request $request, Response $response, array $args): Response
    {

        $data["page_title"] = "Categories";
        //* 1) Fetch from the DB.
        $categories = $this->categories_model->getCategories();

        if (!$categories) {
            return $response->withStatus(401);
        }

        //* Prepare the data to be passed
        //!NOTE: Must be a well structured associative array
        $data["data"] = [
            'title' => "List of Categories",
            'message' => 'Welcome to categories page',
            'categories' => $categories
        ];
        //* Render a view (OR we can redirect the request to another view)
        return $this->render($response, 'admin/categories/categoriesIndexView.php', $data);
    }


    public function show(Request $request, Response $response, array $args): Response
    {
        return $response;
    }
    public function create(Request $request, Response $response, array $args): Response
    {
        $new_category_info = $request->getQueryParams();
        $category_name = $new_category_info["category_name"];
        $category_desc = $new_category_info["category_description"];
        $this->categories_model->createCategory($new_category_info);
        FlashMessage::success('New category created successfully');
        return $this->redirect($request, $response, 'categories.index');

        // return $response;
    }
    public function edit(Request $request, Response $response, array $args): Response
    {
        //*Step 1) Get the item id to be edited from the query string params
        //*section of the URI
        // dd($args);
        $category_id = $args["category_id"];

        // dd("Editing the category with id " . $category_id);

        //*Step 2) Pull existing info from the identified item from db

        $category = $this->categories_model->getCategoriesId($category_id);
        // dd($category);
        $data = [
            'category' => $category
        ];

        //*Step 3 Pass it to the view where the update/editing from the filled form with the item info will be rendered
        return $this->render($response, 'admin/categories/categoriesEditView.php', $data);
    }
    public function update(Request $request, Response $response, array $args): Response
    {
        //!HAndle the submission of the edit form
        //*step 1) get the received the data from the form

        $category_info = $request->getParsedBody();

        // dd($category_info);

        //*ask the model to save the product
        $category_id = $category_info["category_id"];
        // dd("Editing category:" .  $category_id);
        $this->categories_model->updateCategory($category_id, $category_info);
        FlashMessage::success('Category updated successfully!');
        return $this->redirect($request, $response, 'categories.index');
    }
    public function delete(Request $request, Response $response, array $args): Response
    {

        $category_info = $request->getParsedBody();
        $category_id = $category_info["category_id"];
        // dd("Editing category:" .  $category_id);
        $this->categories_model->deleteCategory($category_id);
        FlashMessage::success('Category has been successfully deleted');
        return $this->redirect($request, $response, 'categories.index');
    }
}
