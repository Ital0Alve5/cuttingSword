<?php

namespace controllers\api;

use controllers\Controller;

use models\Session;
use models\Users;

class LoginController extends Controller
{
    public function index($data)
    {
        $user = new Users();
        $user->loadUserByEmail($data['email']);
        if ($user->getUserEmail() && $user->getUserPassword() === md5($data['password'])) {
            Session::createSession($user->getUserId(), $user->getUserEmail());
            echo $user;
        } else {
            echo json_encode(["error" => true, "message" => "Usuário ou senha incorretos"], JSON_UNESCAPED_UNICODE);
        }
    }
}
