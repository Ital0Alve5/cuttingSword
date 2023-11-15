<?php

namespace controllers\web;

use controllers\Controller;

class RankingController extends Controller
{
    public function casualRanking()
    {
        $this->protectedView('ranking');
    }
    public function leagueRanking()
    {
        $this->protectedView('leagueRanking');
    }
}
