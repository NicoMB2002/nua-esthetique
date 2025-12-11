<?php

declare(strict_types=1);

/**
 * This file contains the routes for the web application.
 */

use App\Controllers\AuthController;
use App\Controllers\CategoriesController;
use App\Controllers\CustomerController;
use App\Controllers\ProductsController;
use App\Controllers\DashboardController;
use App\Middleware\SessionMiddleware;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\UploadController;
use App\Middleware\AuthMiddleware;
use App\Middleware\AdminAuthMiddleware;


return static function (Slim\App $app): void {

    //? Admin-related Routes (admin routes group)

    //*Base URI: localhost/OnlineStore_Assignment2/admin/dashboard

    $app -> group('/admin', function ($group) {
        //add/ register admin routes
        $group->get('/dashboard', [DashboardController::class, 'index']
        )->setName('admin.dashboard');
        $group->get('/products', [ProductsController::class, 'index']
        )->setName('products.index');

        $group->get('/products/edit/{product_id}', [ProductsController::class, 'edit']
        )->setName('products.edit');

        $group->post('/products/update/{product_id}', [ProductsController::class, 'update']
        )->setName('products.update');

        $group->get('/categories', [CategoriesController::class, 'index'])
            ->setName('categories.index');

        $group->get('/categories/edit/{category_id}', [CategoriesController::class, 'edit'])
            ->setName('categories.index');

        $group->get('/logout', [AuthController::class, 'logout'])->setName('auth.logout');
        // $group->get('/logout', [LoginController::class, 'logout'])
        // ->setName('logout.admin');

    })->add(AdminAuthMiddleware::class);

    $app -> group('/user', function($group){
        $group->get('/dashboard', [CustomerController::class, 'index']
        )->setName('user.dashboard');
        $group->get('/products', [CustomerController::class, 'products']
        )->setName('user.products');
        $group->get('/logout', [AuthController::class, 'logout'])->setName('auth.logout');

    });

    //* NOTE: Route naming pattern: [controller_name].[method_name]
    // $app->get('/login', [LoginController::class, 'index'])
    //     ->setName('login');

    // $app->get('/logout', [LoginController::class, 'logout'])
    //     ->setName('logout');

    // $app->post('/processing', [LoginController::class, 'processLogin'])
        // ->setName('processLogin');

    $app->get('/upload', [UploadController::class, 'index'])->setName('upload.index'); // GET displays the form

    $app->post('/upload', [UploadController::class, 'upload'])->setName('upload.process'); //POST processes uploads



    $app->get('/register', [AuthController::class, 'register'])->setName('auth.register');
    $app->post('/registerEmail', [AuthController::class, 'registerEmail'])->setName('auth.registerEmail');
    $app->post('/register', [AuthController::class, 'store'])->setName('auth.store');

    $app->get('/login', [AuthController::class, 'login'])->setName('auth.login');
    $app->post('/login', [AuthController::class, 'authenticate'])->setName('auth.authenticate');

    $app->get('/logout', [AuthController::class, 'logout'])->setName('auth.logout');

    $app->get('/dashboard', [AuthController::class, 'dashboard'])
        ->setName('user.dashboard')
        // checks if user is logged in
        ->add(AuthMiddleware::class);

    $app->get('/home', [HomeController::class, 'index'])
        ->setName('home.index');

    $app->get('/', [HomeController::class, 'index'])
        ->setName('home.index');




    // A route to test runtime error handling and custom exceptions.
    $app->get('/error', function (Request $request, Response $response, $args) {
        throw new \Slim\Exception\HttpNotFoundException($request, "Something went wrong");
    });

    $app->group('/user', function ($group){

    });
};
