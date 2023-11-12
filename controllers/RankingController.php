<?php

class RankingController extends Controller
{
    public function index()
    {
        $this->protectedView('ranking');
    }

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
