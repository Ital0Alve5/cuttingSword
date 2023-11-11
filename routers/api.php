<?php

//Teste
Router::get('/teste', 'TesteController@getUser');

Router::post('/teste', 'TesteController@login');


// History
Router::get('/history/{userId}', 'HistoryController@getGlobalGameHistory');

// Login
Router::post('/login','LoginController@index');

//Signup
Router::post('/signup','SignupController@index');
