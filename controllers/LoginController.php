<?php

class LoginController{
    public function index($data)
    {
        $user = new Users();
        $user->loadUserByEmail($data['email']);
        if ($user->getUserEmail() && $user->getUserPassword() === md5($data['password'])) {
            SessionController::createSession($user->getUserId(), $data['email']);
            echo $user;
        } else {
            echo json_encode(["error" => true, "message" => "Usuário ou senha incorretos"], JSON_UNESCAPED_UNICODE);
        }
    }
}