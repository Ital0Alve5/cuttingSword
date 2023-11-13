<?php

namespace controllers\web;

use controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        require("./view/home.php");
    }
}
