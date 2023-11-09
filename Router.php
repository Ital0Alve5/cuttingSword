<?php

class Router
{
    private $routes = [];

    public function addRoute($method, $urlPattern, $controller)
    {
        $pattern = '/^' . str_replace('/', '\/', $urlPattern) . '$/';
        $this->routes[] = ['method' => $method, 'pattern' => $pattern, 'controller' => $controller];
    }

    public function route()
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($method == $route['method'] && preg_match($route['pattern'], $url, $matches)) {
                // Remove o primeiro elemento, que contém a URL completa
                array_shift($matches);

                switch ($route['method']) {
                    case "GET":
                        $this->handleGetMethods($route);
                        break;
                    case "POST":
                    case "UPDATE":
                    case "DELETE":
                        $this->handleInputMethods($route);
                }
                return;
            }
        }

        $this->notFound();
    }

    private function handleGetMethods($route)
    {
        $controller = new $route['controller']['class']();
        $controller->{$route['controller']['method']}();
    }

    private function handleInputMethods($route)
    {
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);
        $controller = new $route['controller']['class']();
        $controller->{$route['controller']['method']}($data);
    }

    private function notFound()
    {
        require("./view/404.php");
    }
}
