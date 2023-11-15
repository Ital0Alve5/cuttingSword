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
            Session::createSession($user->getUserId(), $user->getUserEmail(), 0);
            echo json_encode(["error" => false, "userId" => $user->getUserId(), "userName" => $user->getUserName(), "userEmail" => $user->getUserEmail()], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => true, "message" => "Usuário ou senha incorretos"], JSON_UNESCAPED_UNICODE);
        }
    }
}
