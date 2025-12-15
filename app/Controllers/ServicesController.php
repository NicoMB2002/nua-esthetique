<?php

namespace App\Controllers;

use App\Helpers\FlashMessage;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;

class ServicesController extends BaseController
{
    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        $data = [
            'title' => 'Services offered',
            'message' => 'Book with us!'
        ];

        return $this->render($response, 'services.php', $data);
    }
}
