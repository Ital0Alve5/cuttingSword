<?php

class LeagueController
{

    public function getLeagueNameByLeagueId($params)
    {
        SessionController::SessionProtection();
        $league = new Leagues();
        $league->loadLeagueById($params['leagueId']);
        echo json_encode(["leagueName" => $league->getName()]);
    }
}
