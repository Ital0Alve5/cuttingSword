<?php

namespace controllers\api;

use controllers\Controller;

use models\CasualGameHistory;
use models\LeagueGameHistory;

class GameController extends Controller{
    public function index($data){

        if($data['leagueId' == 0]) {
            CasualGameHistory::createUserHistory($data['userId'], $data['timeLeft'], $data['victory'], $data['matchPoints'], $data['matchLevel']);
        } else {
            LeagueGameHistory::createLeagueUserHistory($data['leagueId'], $data['userId'], $data['timeLeft'], $data['victory'], $data['matchPoints'], $data['matchLevel']);
        }
    }
}