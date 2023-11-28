<?php

namespace models;

class Sanitize
{
    public static function sanitizeNumber($num)
    {
        $num = filter_var($num, FILTER_SANITIZE_NUMBER_INT);
        return filter_var($num, FILTER_VALIDATE_INT);
    }

    public static function sanitizeEmail($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function sanitizeName($username)
    {
        $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
        return preg_match('/^[a-zA-Z0-9 _-]+$/', $username);
    }
}
