<?php

class TesteController
{
    public function getUser()
    {
        $user = new Users();
        $user->loadUserById(3);
        echo $user;
    }

    public function createUser($data)
    {
        $newUserId = Users::createUser($data['name'], $data['email'], $data['password']);
        echo json_encode(["userId" => $newUserId], JSON_UNESCAPED_UNICODE);
    }
}
