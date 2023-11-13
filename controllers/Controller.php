<?php

namespace controllers;

use models\Session;

class Controller
{
    protected function redirect($url, $statusCode = 302)
    {
        header("Location: {$url}", $statusCode);
    }

    protected function protectedView($view, $viewRedirect = 'entry')
    {
        if (Session::sessionProtection()) require("./view/{$view}.php");
        else $this->redirect("/{$viewRedirect}");
    }
}
