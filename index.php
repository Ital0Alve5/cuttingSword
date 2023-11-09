<?php

function autoload($className)
{
    if (file_exists(__DIR__ . '/controllers/' . $className . '.php'))
        require_once(__DIR__ . '/controllers/' . $className . '.php');
    else if (file_exists(__DIR__ . '/models/' . $className . '.php'))
        require_once(__DIR__ . '/models/' . $className . '.php');
    else if (file_exists(__DIR__ . '/models/db' . $className . '.php'))
        require_once(__DIR__ . '/models/db' . $className . '.php');
    else if(file_exists(__DIR__ . '/app/' . $className . '.php')){
        require_once(__DIR__ . '/app/' . $className . '.php');
    }
}

spl_autoload_register('autoload');

Cors::setupCors();

include './routers/index.php';
