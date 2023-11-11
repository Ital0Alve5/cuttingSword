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

    public static function get($url, $controller)
    {
        Router::addRoute('GET', $url, $controller);
    }

    public static function post($url, $controller)
    {
        Router::addRoute('POST', $url, $controller);
    }

    public static function update($url, $controller)
    {
        Router::addRoute('UPDATE', $url, $controller);
    }

    public static function delete($url, $controller)
    {
        Router::addRoute('DELETE', $url, $controller);
    }

    public static function route()
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];


        foreach (Router::$routes as $route) {
            if ($route['httpMethod'] === 'GET') $route = Router::handleGetParams($route, $url);

            if ($method == $route['httpMethod'] && preg_match(Router::sanitizeUrl($route['url']), $url, $matches)) {

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

    private static function handleGetParams($route, $url)
    {
        $GETParams = [];

        if (str_contains($route['url'], '{') && str_contains($route['url'], '}')) {
            $mappedRoute = explode('/', $route['url']);
            $currentRoute = explode('/', $url);

            if (count($mappedRoute) === count($currentRoute)) {
                foreach ($mappedRoute as $index => $path) {
                    if ($path !== $currentRoute[$index]) {
                        if (str_contains($path, '{') && str_contains($path, '}')) {
                            $removeFirstKey = str_replace("{", "", $mappedRoute[$index]);
                            $removeSecondKey = str_replace("}", "", $removeFirstKey);
                            $GETParams[$removeSecondKey] = $currentRoute[$index];
                            $mappedRoute[$index] = $currentRoute[$index];
                        }
                    }
                }

                $route['url'] = implode('/', $mappedRoute);
                $route['GETParams'] = $GETParams;
                if ($route['url'] !== $url) return;
                return $route;
            }
        }
        return $route;
    }

    private static function handleGetMethods($route)
    {
        $controller = new $route['controllerName']();
        $controller->{$route['controllerMethod']}($route['GETParams']);
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
