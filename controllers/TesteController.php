<?php

class TesteController
{
    public function getUser()
    {
        $user = new Users();
        $user->loadUserById(3);
        // $user->loadUserByEmail('italo_alves_@outlook.com');
        echo $user;
    }

    public function createUser($data)
    {
        $newUserId = Users::createUser($data['name'], $data['email'], $data['password']);
        echo json_encode(["userId" => $newUserId], JSON_UNESCAPED_UNICODE);
    }

    public function login($data)
    {
        $user = new Users();
        $user->loadUserByEmail($data['email']);
        if ($user->getUserEmail() && $user->getUserPassword() === md5($data['password'])) {
            echo $user;
        } else {
            echo json_encode(["error" => true, "message" => "Usuário ou senha incorretos"], JSON_UNESCAPED_UNICODE);
        }
    }
}
