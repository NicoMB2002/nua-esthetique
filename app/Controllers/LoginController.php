<?php

namespace App\Controllers;
use App\Helpers\SessionManager;
use App\Helpers\FlashMessage;
use App\Domain\Models\CustomerModel;
use App\Domain\Models\EmployeeModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use DI\Container;


class LoginController extends BaseController
{
    public function __construct(Container $container, private EmployeeModel $employee_model ) {
        parent::__construct($container);
    }

    public function index(Request $request, Response $response ) : Response
    {
        $data = [];
        return $this->render( $response,"loginView.php", $data);
    }
        public function logout(Request $request, Response $response ) : Response
    {
        $data = [];
        SessionManager::destroy();
           return $this->redirect($request, $response,'login');
    }

     public function processLogin(Request $request, Response $response, array $args) : Response{
     $data['employees'] = $this->employee_model->getEmployees();


    foreach ($data['employees'] as $employee) {
        if($employee['username']== $_POST['username']){


            if(password_verify($_POST['password'],$employee['password_hash'])){

            SessionManager::set('username',$employee['username']);
            FlashMessage::success("Welcome ".$employee['username']);

            return $this->redirect($request, $response,'home.index');
         }else {
              FlashMessage::error('Password Invalid');

                return $this->redirect($request, $response,'login');

         }
        }else {

                 FlashMessage::error('Username invalid');

              return $this->redirect($request, $response,'login');
        }
      ;
    }

    return $this->redirect($request, $response,'login');

    }


}


