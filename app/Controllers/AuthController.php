<?php

namespace App\Controllers;

use App\Domain\Models\UserModel;
use App\Helpers\FlashMessage;
use App\Helpers\SessionManager;
use DI\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


class AuthController extends BaseController
{

    public function __construct(Container $container, private UserModel $userModel)
    {
        return parent::__construct($container);
    }

    /**
     * Display the registration form (GET request).
     */
    public function register(Request $request, Response $response, array $args): Response
    {
        $data = ["title" => 'Register'];

        return $this->render($response, 'auth/register.php', $data);
    }

    public function store(Request $request, Response $response, array $args): Response
    {
        $data = ["title" => 'Register'];
        $userRegistrationInfo = $request->getParsedBody();
        $firstName = $userRegistrationInfo['first_name'];
        $lastName = $userRegistrationInfo['last_name'];
        $userName = $userRegistrationInfo['username'];
        $email = $userRegistrationInfo['email'];
        $password = $userRegistrationInfo['password'];
        $confirm_password = $userRegistrationInfo['confirm_password'];
        $role = $userRegistrationInfo['role'];

        $errors = [];

        foreach ($userRegistrationInfo as $key => $userData) {
            if (empty($userData)) {
                $errors[] = "All data must be filled";
                break;
            }
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please input a valid email example@email.com";
        } else if ($this->userModel->emailExists($email)) {
            $errors[] = "Email already assigned to a registered user";
        }

        if ($this->userModel->usernameExists($userName)) {
            $errors[] = "Username already in use please choose differently";
        }

        if (strlen($password) < 8) {
            $errors[] = "Password must beat least 8 character s long";
        } else {
            if (!preg_match('/[0-9]/', $password)) {
                $errors[] = 'Password must contain at least 1 number';
            }
        }

        if ($password !== $confirm_password) {
            $errors[] = "passwords must match";
        }

        if (!empty($errors)) {
            foreach ($errors as $key => $error) {
                FlashMessage::error($error);
                return $this->redirect($request, $response, 'auth.register');
            }
        } else {
            try {
                $userData = [
                    "first_name" => $firstName,
                    "last_name" => $lastName,
                    "username" => $userName,
                    "email" => $email,
                    "password" => $password,
                    "role" => $role,
                ];
                $userId = $this->userModel->createUser($userData);

                FlashMessage::success('Registration successful Please log in');
                return $this->redirect($request, $response, 'auth.login');
            } catch (\Throwable $th) {
                FlashMessage::error('Registration failed. Please try again');
                return $this->redirect($request, $response, 'auth.register');
            }
        }
    }

    public function login(Request $request, Response $response, array $args): Response
    {
        $data = ['title' => "Login"];
        return $this->render($response, 'auth/login.php', $data);
    }

    public function authenticate(Request $request, Response $response, array $args): Response
    {
        $inputData = $request->getParsedBody();

        $email = $inputData["identifier"];
        $password = $inputData["password"];

        $errors = [];

        $user = [];
        if (empty($email) || empty($password)) {
            $errors[] = "All fields must be filled out";
        } else {
            $user = $this->userModel->verifyCredentials($email, $password);
            if ($user != null) {
                SessionManager::set('user_id', $user['id']);
                SessionManager::set('user_email', $user['email']);
                SessionManager::set('user_name', $user['first_name'] . " " . $user['last_name']);
                SessionManager::set('user_role', $user['role']);
                SessionManager::set('is_authenticated', true);

                FlashMessage::success("Welcome back, {$user['first_name']}!");
                if ($user['role'] === 'admin') {
                    return $this->redirect($request, $response, 'admin.dashboard');
                } else {
                    return $this->redirect($request, $response, 'user.dashboard');
                }
            } else {
                FlashMessage::error("User not found or password does not match, please try again");
                return $this->redirect($request, $response, 'auth.login');
            }
        }
    }

    public function logout(Request $request, Response $response, array $args): Response
    {
        SessionManager::destroy();
        SessionManager::start();
        FlashMessage::success('You have been successfully logged out');
        return $this->redirect($request, $response, 'auth.login');
    }

    public function dashboard(Request $request, Response $response, array $args): Response
    {
        $data = ["title" => "Dashboard"];

        return $this->render($response, 'user/dashboard.php', $data);
    }
}
