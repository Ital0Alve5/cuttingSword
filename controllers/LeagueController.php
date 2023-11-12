<?php

class LeagueController
{

    public function getLeagueNameByLeagueId($params)
    {
        //Usuário obrigado a estar logado
        SessionController::SessionProtection();     

        //Sanitização de url com leagueID malicioso
        if(!SanitizeController::sanitizeNumber($params)){
            echo json_encode(["error" => $true, "message" => "ID de liga inválido"]);
        }
        $league = new Leagues();
        $league->loadLeagueById($params['leagueId']);
        echo json_encode(["leagueName" => $league->getName()]);
    }
}