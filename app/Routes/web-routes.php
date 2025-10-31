<?php

declare(strict_types=1);

/**
 * This file contains the routes for the web application.
 */
use App\Middleware\SessionMiddleware;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


return static function (Slim\App $app): void {

    $app->add(SessionMiddleware::class);
    //* NOTE: Route naming pattern: [controller_name].[method_name]
    $app->get('/login', [LoginController::class, 'index'])
        ->setName('login');

    $app->get('/logout', [LoginController::class, 'logout'])
        ->setName('logout');

    $app->post('/processing', [LoginController::class, 'processLogin'])
        ->setName('processLogin');

    $app->get('/home', [HomeController::class, 'index'])
        ->setName('home.index');




    // A route to test runtime error handling and custom exceptions.
    $app->get('/error', function (Request $request, Response $response, $args) {
        throw new \Slim\Exception\HttpNotFoundException($request, "Something went wrong");
    });

    $app->group('/admin', function ($group){

    });
};
