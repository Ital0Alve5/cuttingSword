<?php

class RankingController
{
    public function index()
    {
        //Usuário obrigado a estar logado
        SessionController::SessionProtection();   

        require("./view/ranking.php");
    }

    public function getTotalRanking($params)
    {
        //Usuário obrigado a estar logado
        SessionController::SessionProtection();     

        //Sanitização de url com leagueID malicioso
        if(!SanitizeController::sanitizeNumber($params)){
            echo json_encode(["error" => true, "message" => "ID de liga inválido"]);
        }

        if ($params['leagueId'] === "0")
            echo json_encode(Ranking::getCasualTotalRanking());
        else echo json_encode(Ranking::getLeagueTotalRanking($params['leagueId']));
    }

    public function getWeekRanking($params)
    {
        //Usuário obrigado a estar logado
        SessionController::SessionProtection();     

        //Sanitização de url com leagueID malicioso
        if(!SanitizeController::sanitizeNumber($params)){
            echo json_encode(["error" => true, "message" => "ID de liga inválido"]);
        }

        if ($params['leagueId'] === "0")
            echo json_encode(Ranking::getCasualWeekRanking());
        else echo json_encode(Ranking::getLeagueWeekRanking($params['leagueId']));
    }
}
