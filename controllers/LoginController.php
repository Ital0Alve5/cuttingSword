<?php

class LoginController extends Controller
{
    public function index($data)
    {
        if (!Sanitize::autoSanitize($data)) echo json_encode(["error" => true, "message" => "Caracteres inválidos"], JSON_UNESCAPED_UNICODE);
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
