<?php

namespace controllers\api;

use controllers\Controller;
use models\Session;

class LogoutController extends Controller
{
    public function index()
    {
        Session::Logout();
        $this->redirect('/entry', 200);
    }
}
