<?php

namespace controllers\web;

use controllers\Controller;

class LeagueController extends Controller
{
    public function leaguesList()
    {
        $this->protectedView('leagues');
    }

    public function createLeague()
    {
        $this->protectedView('createLeague');
    }

}
