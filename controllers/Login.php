<?php

class Login{
//Supostamente vai receber os inputs do front no $data (?)
    public function index(){
        $route = [
            'controllerName' => '/login',
            'controllerMethod' => 'Login@index',
        ];
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);
        $controller = new $route['controllerName']();
        $controller->{$route['controllerMethod']}($data);

//agora que tenho as informações do front eu teria que checar pra ver se ta tudo certo, sanitizar, colocar no banco de dados e dar um echo se deu sucesso ou falha com os dados
        echo $data;
}
}