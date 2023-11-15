<?php

namespace controllers\web;

use controllers\Controller;

class LeagueController extends Controller
{
    public function leaguesList()
    {
        $this->protectedView('leagues');
    }

    public function entryLeagues()
    {
        $this->protectedView('entryLeagues');
    }

}
