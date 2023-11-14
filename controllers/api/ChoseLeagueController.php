<?php

namespace controllers\api;

use controllers\Controller;

use models\Session;
use models\Leagues;
use models\Users;

class ChoseLeagueController extends Controller
{
    public function index($data){

        $league = new Leagues();
        $league->loadLeagueByName($data['leagueName']);
        $user = new Users();
        $user->loadUserById($_SESSION['userId']);
        if (Leagues::leagueExists($data['leagueName']) && $league->getSecretKey() === md5($data['secretKey'])) {
            Users::linkUserToLeague($_SESSION['userId'], $league->getId());
            Session::createSession($_SESSION['userId'], $_SESSION['email'], $league->getId());
            echo json_encode(["error" => false, "message" => "Inserido na liga com sucesso"], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => true, "message" => "Nome ou senha da liga incorretos"], JSON_UNESCAPED_UNICODE);
        }
    }
}