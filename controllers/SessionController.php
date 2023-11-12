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
                header("Location: ../view/entry.php");
                exit();
            }
        }

//Deve ser chamda quando o usuário quer sair da sessão
        public static function Logout(){
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            }
            session_unset();
            session_destroy();
            require("./home/entry.php");

        }
    }
