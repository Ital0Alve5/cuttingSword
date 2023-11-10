<?php 

//Teste
Router::get('/teste', 'TesteController@getUser');
Router::post('/teste', 'TesteController@createUser');


// Login
Router::post('/login','LoginController@index');
