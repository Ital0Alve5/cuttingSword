<?php

include './app/Router.php';
include './app/Cors.php';

Cors::setupCors();

function autoload($className)
{
    if (file_exists(__DIR__ . '/controllers/' . $className . '.php'))
        require_once(__DIR__ . '/controllers/' . $className . '.php');
    else if (file_exists(__DIR__ . '/models/' . $className . '.php'))
        require_once(__DIR__ . '/models/' . $className . '.php');
    else if (file_exists(__DIR__ . '/models/db' . $className . '.php'))
        require_once(__DIR__ . '/models/db' . $className . '.php');
}

spl_autoload_register('autoload');



// Home
Router::GET('/', 'HomeController@index');
Router::GET('/home', 'HomeController@index');


// Game
Router::GET('/game', 'GameController@index');


//Teste
Router::GET('/teste', 'TesteController@getUser');
Router::POST('/teste', 'TesteController@createUser');

// Load routes
Router::route();
