<?php

namespace controllers\api;

use models\Session;

class LogoutController
{
    public function index()
    {
        Session::Logout();
    }
}
