<?php

namespace App\Controllers;

use App\Helpers\FlashMessage;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;

class FAQController extends BaseController
{
    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    public function index(Request $request, Response $response, array $args): Response
    {
        $data = [
            'title' => 'FAQ',
            'message' => 'Find an answer to all your questions!'
        ];


        return $this->render($response, 'faq.php', $data);
    }
}
