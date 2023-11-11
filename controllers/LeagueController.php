<?php

class LeagueController
{
    public function getLeagueNameByLeagueId($params)
    {
        $league = new Leagues();
        $league->loadLeagueById($params['leagueId']);
        echo json_encode(["leagueName" => $league->getName()]);
    }
}
