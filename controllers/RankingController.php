<?php

class RankingController
{
    public function index()
    {
        require("./view/ranking.php");
    }

    public function getTotalRanking($params)
    {
        if ($params['leagueId'] === "0")
            echo json_encode(Ranking::getCasualTotalRanking());
        else echo json_encode(Ranking::getLeagueTotalRanking($params['leagueId']));
    }

    public function getWeekRanking($params)
    {
        if ($params['leagueId'] === "0")
            echo json_encode(Ranking::getCasualWeekRanking());
        else echo json_encode(Ranking::getLeagueWeekRanking($params['leagueId']));
    }
}
