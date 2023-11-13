<?php

namespace controllers\api;

use controllers\Controller;
use models\Session;
use models\Ranking;

class RankingController extends Controller
{
    public function getTotalRanking($params)
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        if ($params['leagueId'] === "0")
            echo json_encode(Ranking::getCasualTotalRanking(), JSON_UNESCAPED_UNICODE);
        else echo json_encode(Ranking::getLeagueTotalRanking($params['leagueId']), JSON_UNESCAPED_UNICODE);
    }

    public function getWeekRanking($params)
    {
        if (!Session::sessionProtection()) {
            echo json_encode(["error" => true, "message" => "Permissões insuficientes"], JSON_UNESCAPED_UNICODE);
            return;
        }

        if ($params['leagueId'] === "0")
            echo json_encode(Ranking::getCasualWeekRanking(), JSON_UNESCAPED_UNICODE);
        else echo json_encode(Ranking::getLeagueWeekRanking($params['leagueId']), JSON_UNESCAPED_UNICODE);
    }
}
