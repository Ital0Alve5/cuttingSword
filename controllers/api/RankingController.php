<?php

namespace controllers\api;

use controllers\Controller;
use models\Session;
use models\Ranking;

class RankingController extends Controller
{
    public function getCasualTotalRanking()
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }


        echo json_encode(Ranking::getCasualTotalRanking(), JSON_UNESCAPED_UNICODE);
    }

    public function getCasualWeekRanking()
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }


        echo json_encode(Ranking::getCasualWeekRanking(), JSON_UNESCAPED_UNICODE);
    }

    public function getLeagueTotalRanking()
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        if(!$_SESSION['leagueId'])
        {
            echo json_encode(["error" => true, "message" => "Você não está em nenhuma liga"], JSON_UNESCAPED_UNICODE);
            return;
        }
        echo json_encode(Ranking::getLeagueTotalRanking($_SESSION["leagueId"]), JSON_UNESCAPED_UNICODE);
    }

    public function getLeagueWeekRanking()
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        if(!$_SESSION['leagueId'])
        {
            echo json_encode(["error" => true, "message" => "Você não está em nenhuma liga"], JSON_UNESCAPED_UNICODE);
            return;
        }
        echo json_encode(Ranking::getLeagueWeekRanking($_SESSION["leagueId"]), JSON_UNESCAPED_UNICODE);
    }
}
