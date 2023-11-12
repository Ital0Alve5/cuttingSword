<?php
class LogoutController
{
    public function index()
    {
        Session::Logout();
    }
}
