<?php

declare(strict_types=1);

/**
 * This file contains the routes for the web application.
 */

use App\Controllers\ProductsController;
use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


return static function (Slim\App $app): void {

    //? Admin-related Routes (admin routes group)

    //*Base URI: localhost/OnlineStore_Assignment2/admin/dashboard

    $app -> group('/admin', function ($group) {
        //add/ register admin routes
        $group->get( //we use '$group' instead of $app here
            '/dashboard', [DashboardController::class, 'index']
        )->setName('dashboard.index');
        $group->get(
            '/products', [ProductsController::class, 'products']
        )->setName('products.index');
    });

    //* NOTE: Route naming pattern: [controller_name].[method_name]
    $app->get('/', [HomeController::class, 'index'])
        ->setName('home.index');

    $app->get('/home', [HomeController::class, 'index'])
        ->setName('home.index');



    // A route to test runtime error handling and custom exceptions.
    $app->get('/error', function (Request $request, Response $response, $args) {
        throw new \Slim\Exception\HttpNotFoundException($request, "Something went wrong");
    });
};
