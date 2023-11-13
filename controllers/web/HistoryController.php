<?php

namespace controllers\web;

use controllers\Controller;

class HistoryController extends Controller
{
    public function index()
    {
        $this->protectedView("history");
    }
}
