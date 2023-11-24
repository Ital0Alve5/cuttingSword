<?php

namespace controllers\web;

use controllers\Controller;

class GameController extends Controller
{
    public function index()
    {
        $this->protectedView("game");
    }
}
