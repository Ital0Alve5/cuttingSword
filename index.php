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
Router::get('/', 'HomeController@index');
Router::get('/home', 'HomeController@index');


// Game
Router::get('/game', 'GameController@index');


//Teste
Router::get('/teste', 'TesteController@getUser');
Router::post('/teste', 'TesteController@createUser');

// Load routes
Router::route();
