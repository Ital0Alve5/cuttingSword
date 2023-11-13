<?php

namespace controllers\web;

use controllers\Controller;

class RankingController extends Controller
{
    public function index()
    {
        $this->protectedView('ranking');
    }
}
