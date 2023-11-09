<?php

include './app/Router.php';
include './app/Cors.php';

Cors::setupCors();

function AutoloadModels($className)
{
    $extension =  spl_autoload_extensions();
    if (file_exists(__DIR__ . '/models/' . $className . $extension)) {
        require_once(__DIR__ . '/models/' . $className . $extension);
    }
}

function AutoloadControllers($className)
{
    $extension =  spl_autoload_extensions();
    if (file_exists(__DIR__ . '/controllers/' . $className . $extension)) {
        require_once(__DIR__ . '/controllers/' . $className . $extension);
    }
}

spl_autoload_extensions('.php');
spl_autoload_register('AutoloadModels');
spl_autoload_register('AutoloadControllers');

$router = new Router();

$router->addRoute('GET', '/', ['class' => 'HomeController', 'method' => 'index']);

$router->addRoute('GET', '/game', ['class' => 'GameController', 'method' => 'index']);

$router->addRoute('GET', '/teste', ['class' => 'TesteController', 'method' => 'getUser']);

$router->addRoute('POST', '/teste', ['class' => 'TesteController', 'method' => 'createUser']);

$router->route();
