<?php

namespace controllers\api;

use controllers\Controller;

use models\CasualGameHistory;
use models\LeagueGameHistory;
use models\Session;

class GameController extends Controller
{
    public function index($data)
    {

        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        if ($_SESSION['leagueId'] == 0) {
            CasualGameHistory::createUserHistory($_SESSION['userId'], $data['timeLeft'], $data['victory'], $data['matchPoints'], $data['matchLevel']);
        } else {
            LeagueGameHistory::createLeagueUserHistory($_SESSION['leagueId'], $_SESSION['userId'], $data['timeLeft'], $data['victory'], $data['matchPoints'], $data['matchLevel']);
        }

        echo json_encode(["error" => false]);
    }
}
