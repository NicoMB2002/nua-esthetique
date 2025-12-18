<?php

namespace App\Controllers;

use App\Helpers\FlashMessage;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;

class AboutUsController extends BaseController
{
    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        $data = [
            'title' => 'About Us',
            'message' => 'Find out who we are'
        ];


        return $this->render($response, 'aboutUs.php', $data);
    }
}
