<?php


spl_autoload_register(
    function ($className) {
        if (str_contains($className, "\\")) {
            $className = str_replace("\\", "/", $className);
            if (file_exists(__DIR__ . '/' . $className . '.php')) {
                require_once(__DIR__ . '/' . $className . '.php');
            }
        } else if (file_exists(__DIR__ . '/controllers/' . $className . '.php')) {
            require_once(__DIR__ . '/controllers/' . $className . '.php');
        } else if (file_exists(__DIR__ . '/models/' . $className . '.php'))
            require_once(__DIR__ . '/models/' . $className . '.php');
        else if (file_exists(__DIR__ . '/models/db/' . $className . '.php'))
            require_once(__DIR__ . '/models/db/' . $className . '.php');
        else if (file_exists(__DIR__ . '/app/' . $className . '.php')) {
            require_once(__DIR__ . '/app/' . $className . '.php');
        }
    }
);

Cors::setupCors();

include './routers/index.php';
