<?php

class Session
{
    public static function createSession($userId, $email)
    {
        if (session_id() == '') session_start();
        $_SESSION['userId'] = $userId;
        $_SESSION['email'] = $email;
    }

    public static function sessionProtection()
    {
        if (session_id() == '') session_start();
        if (!isset($_SESSION['userId'])) return false;
        return $_SESSION['userId'];
    }

    public static function Logout()
    {
        if (session_id() == '') session_start();
        session_unset();
        session_destroy();
    }
}
