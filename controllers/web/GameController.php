<?php

namespace controllers\web;

use controllers\Controller;

class GameController extends Controller
{
    public function index()
    {
        require("./view/game.php");
        $this->protectedView("entry");
    }
}
