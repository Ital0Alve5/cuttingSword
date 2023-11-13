<?php

namespace controllers\web;

use controllers\Controller;

class LeagueController extends Controller
{
    public function index()
    {
        $this->protectedView('leagues');
    }
}
