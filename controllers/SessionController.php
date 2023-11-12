<?php
    
    class SessionController{

//Chamada após usuario cadastrar ou logar, coloca o id e o email dele na sessão
        public static function createSession($userId, $email){
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
            $_SESSION['userId'] = $userId;
            $_SESSION['email'] = $email;
        }

//Deve ser a primeira função a ser chamada quando a pagina é protegida. Se retornar false, vou redirecionar a pessoa direto pro login
        public static function SessionProtection(){
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
            if (!isset($_SESSION['userId'])){
                require("./view/entry.php");
            }
        }
    }
