<?php

namespace controllers\api;

use controllers\Controller;
use models\Session;
use models\Users;

class UserController extends Controller
{
    public function getLoggedUserInfo()
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }
        $user = new Users();
        $user->loadUserById($_SESSION['userId']);

        echo json_encode(["userId" => $user->getUserId(), "userName" => $user->getUserName()], JSON_UNESCAPED_UNICODE);
    }

    public function getUserLeaguesList()
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }
        $userId = $_SESSION['userId'];
        $user = new Users();
        $user->loadUserById($userId);

        echo json_encode(["userId" => $user->getUserId(), "userName" => $user->getUserName()], JSON_UNESCAPED_UNICODE);
    }
}
