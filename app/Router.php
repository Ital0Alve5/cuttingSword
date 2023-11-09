<?php

class Router
{
    private static $routes = [];

    private static function sanitizeUrl($url)
    {
        return '/^' . str_replace('/', '\/', $url) . '$/';
    }

    private static function addRoute($httpMethod, $url, $controller)
    {
        [0 => $controllerName, 1 => $controllerMethod] = explode('@', $controller);
        Router::$routes[] = ['httpMethod' => $httpMethod, 'url' => $url, 'controllerName' => $controllerName, 'controllerMethod' => $controllerMethod];
    }

    public static function GET($url, $controller)
    {
        Router::addRoute('GET', $url, $controller);
    }

    public static function POST($url, $controller)
    {
        Router::addRoute('POST', $url, $controller);
    }

    public static function UPDATE($url, $controller)
    {
        Router::addRoute('UPDATE', $url, $controller);
    }

    public static function DELETE($url, $controller)
    {
        Router::addRoute('DELETE', $url, $controller);
    }

    public static function route()
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (Router::$routes as $route) {
            if ($method == $route['httpMethod'] && preg_match(Router::sanitizeUrl($route['url']), $url, $matches)) {

                array_shift($matches);

                switch ($route['httpMethod']) {
                    case "GET":
                        Router::handleGetMethods($route);
                        break;
                    case "POST":
                    case "UPDATE":
                    case "DELETE":
                        Router::handleInputMethods($route);
                }
                return;
            }
        }

        Router::notFound();
    }

    private static function handleGetMethods($route)
    {
        $controller = new $route['controllerName']();
        $controller->{$route['controllerMethod']}();
    }

    private static function handleInputMethods($route)
    {
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);
        $controller = new $route['controllerName']();
        $controller->{$route['controllerMethod']}($data);
    }

    private static function notFound()
    {
        require("./view/404.php");
    }
}
