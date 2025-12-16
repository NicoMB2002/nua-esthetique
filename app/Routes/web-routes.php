<?php

declare(strict_types=1);

/**
 * This file contains the routes for the web application.
 */

use App\Controllers\AuthController;
use App\Controllers\CategoriesController;
use App\Controllers\CustomersController;
use App\Controllers\ProductsController;
use App\Controllers\DashboardController;
use App\Middleware\SessionMiddleware;
use App\Controllers\HomeController;
use App\Controllers\ContactController;
use App\Controllers\LoginController;
use App\Controllers\OrdersController;
use App\Controllers\ServicesController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\UploadController;
use App\Middleware\AuthMiddleware;
use App\Middleware\AdminAuthMiddleware;
use App\Controllers\TwoFactorController;
use App\Middleware\TwoFactorMiddleware;


return static function (Slim\App $app): void {

    $app->get('/register', [AuthController::class, 'register'])
        ->setName('auth.register');

    $app->post('/registerEmail', [AuthController::class, 'registerEmail'])
        ->setName('auth.registerEmail');

    $app->post('/register', [AuthController::class, 'store'])
        ->setName('auth.store');

    $app->get('/login', [AuthController::class, 'login'])
        ->setName('auth.login');

    $app->post('/login', [AuthController::class, 'authenticate'])
        ->setName('auth.authenticate');

    $app->get('/logout', [AuthController::class, 'logout'])
        ->setName('auth.logout');

    $app->get('/dashboard', [AuthController::class, 'dashboard'])
        ->setName('user.dashboard')
        ->add(TwoFactorMiddleware::class)
        ->add(AuthMiddleware::class);

    $app->get('/home', [HomeController::class, 'products'])
        ->setName('home.index');

    $app->get('/', [HomeController::class, 'products'])
        ->setName('home.index');

    $app->get('/products', [HomeController::class, 'products']
        )->setName('user.products');

    $app->get('/product/{id}', [ProductsController::class, 'show'])
    ->setName('product.show');
    
    $app->post('/add_item', [HomeController::class, 'addItem']);

    $app->post('/remove_item', [HomeController::class, 'removeItem']);

    $app->get('/checkout', [HomeController::class, 'checkout']);

    $app->get('/confirmOrder', [HomeController::class, 'createOrder']);

    $app->get('/contact', [ContactController::class, 'index'])
        ->setName('contact.index');

    $app->post('/contact', [ContactController::class, 'submit'])
        ->setName('contact.submit');

    $app->get('/services', [ServicesController::class, 'index'])
        ->setName('services.index');


    $app->group('/admin', function ($group) {
        //add/ register admin routes
        $group->get('/dashboard',[DashboardController::class, 'index'])
            ->setName('dashboard.index');
        $group->get(
            '/products',
            [ProductsController::class, 'index']
        )->setName('products.index');

        $group->get(
            '/products/edit/{product_id}',
            [ProductsController::class, 'edit']
        )->setName('products.edit');

        $group->post(
            '/products/update/{product_id}',
            [ProductsController::class, 'update']
        )->setName('products.update');

        $group->get('/products/{product_id}/delete', [ProductsController::class, 'delete'])->setName('products.delete');


        $group->get('/categories', [CategoriesController::class, 'index'])
            ->setName('categories.index');

        $group->get('/categories/edit/{category_id}', [CategoriesController::class, 'edit'])
            ->setName('categories.index');

        $group->get('/categories/delete/{category_id}', [ProductsController::class, 'delete']);

        $group->get('/customers', [CustomersController::class, 'index'])
            ->setName('customers.index');

        $group->get('/orders', [OrdersController::class, 'index'])
            ->setName('orders.index');

        $group->get('/promotions', [OrdersController::class, 'index'])
            ->setName('orders.index');

        $group->get('/logout', [AuthController::class, 'logout'])
            ->setName('admin.logout');




    });
    // ->add(AdminAuthMiddleware::class);


    $app->group('/user', function($group){

        $group->get('/logout', [AuthController::class, 'logout'])
            ->setName('user.logout');

        $group->get('/dashboard', [HomeController::class, 'index'])
                ->setName('user.dashboard');

        $group->get('/home', [HomeController::class, 'index'])
            ->setName('user.dashboard');

        $group->get('/products',[HomeController::class, 'products'])
                ->setName('user.products');

        $group->get('/login', [HomeController::class, 'index']);

        $group->post('/add_item', [HomeController::class, 'addItem']);

        $group->post('/remove_item', [HomeController::class, 'removeItem']);

        $group->get('/checkout', [HomeController::class, 'checkout']);

        $group->get('/confirmOrder', [HomeController::class, 'createOrder']);

        $group->get('/orders', [HomeController::class, 'customerOrders']);

        $group->get('/orders/{id}', [HomeController::class, 'customerOrderDetails']);
    });



    // $app->post('/processing', [LoginController::class, 'processLogin'])
    // ->setName('processLogin');
    $app->get('/upload', [UploadController::class, 'index'])
        ->setName('upload.index'); // GET displays the form

    $app->post('/upload', [UploadController::class, 'upload'])
        ->setName('upload.process'); //POST processes uploads

    // 2FA Setup routes (requires auth, but not 2FA verification)
    $app->get('/2fa/setup', [TwoFactorController::class, 'showSetup'])
        ->setName('2fa.setup')
        ->add(AuthMiddleware::class);

    $app->post('/2fa/verify-and-enable', [TwoFactorController::class, 'verifyAndEnable'])
        ->setName('2fa.enable')
        ->add(AuthMiddleware::class);

    // 2FA Verification during login
    $app->get('/2fa/verify', [TwoFactorController::class, 'showVerify'])
        ->setName('2fa.verify')
        ->add(AuthMiddleware::class);

    $app->post('/2fa/verify', [TwoFactorController::class, 'verify'])
        ->setName('2fa.verify.post')
        ->add(AuthMiddleware::class);

    // 2FA Disable (requires full auth including 2FA)
    $app->get('/2fa/disable', [TwoFactorController::class, 'showDisable'])
        ->setName('2fa.disable.show')
        ->add(TwoFactorMiddleware::class)
        ->add(AuthMiddleware::class);

    $app->post('/2fa/disable', [TwoFactorController::class, 'disable'])
        ->setName('2fa.disable')
        ->add(TwoFactorMiddleware::class)
        ->add(AuthMiddleware::class);


    // A route to test runtime error handling and custom exceptions.
    $app->get('/error', function (Request $request, Response $response, $args) {
        throw new \Slim\Exception\HttpNotFoundException($request, "Something went wrong");
    });

};
