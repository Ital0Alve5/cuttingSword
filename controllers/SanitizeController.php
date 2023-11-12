<?php

class SanitizeController{
    public static function sanitizeNumber($num){
        $num = filter_var($num, FILTER_SANITIZE_NUMBER_INT);
        return filter_Var($num, FILTER_VALIDATE_INT);
    }
}