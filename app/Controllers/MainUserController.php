<?php

namespace App\Controllers;

use App\Domain\Models\UserModel;
use App\Helpers\FlashMessage;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class MainUserController extends BaseController
{
    public function __construct(Container $container, private UserModel $userModel)
    {
        parent::__construct($container);
    }

     public function edit(Request $request, Response $response, array $args): Response
    {
        $data = ["title" => "Update User"];

        return $this->render($response, 'user/edit.php', $data);
    }

    public function editUser(Request $request, Response $response, array $args): Response
    {


        $user_info = $request->getParsedBody();
        dd($user_info);
        $userId = $user_info['id'];

        // dd("Editing category:" .  $category_id);
        $this->userModel->updateUser($userId, $user_info);
        FlashMessage::success('User updated successfully!');

        return $this->redirect($request, $response, 'user.dashboard');
    }
}
