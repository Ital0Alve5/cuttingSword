<?php

//  Todas as funções retornam falso se não for um input válido

class Sanitize{
    public static function sanitizeNumber($num){
        $num = filter_var($num, FILTER_SANITIZE_NUMBER_INT);
        return filter_var($num, FILTER_VALIDATE_INT);
    }

    public static function sanitizeEmail($email){
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function sanitizePassword($password){
        return preg_match('/^[^\W%$&*()_+{}[\]:;<>^,.?~\\/-]{6,20}$/', $password);
    }

    public static function sanitizeName($username){
        $username = filter_var($username, FILTER_SANITIZE_SPECIAL_CHARS);
        return preg_match('/^[a-zA-Z0-9_-]+$/', $username);
    }

   //Preciso saber se isso funciona, te explico na facul 
    public static function autoSanitize($data){

        if ($data['email' != NULL]) {                           //se o $data[email] existir
            if (!Sanitize::sanitizeEmail($data['email'])) {     //se der falso retorna o false
                return false;
            }
        }

        if ($data['password' != NULL]) {
            if (!Sanitize::sanitizePassword($data['password'])) {
                return false;
            }
        }
        return true;
    }
}