<?php 

//Teste
Router::get('/teste', 'TesteController@getUser');
// Router::post('/teste', 'TesteController@createUser');
Router::post('/teste', 'TesteController@login');

Router::get('/getHistory', 'HistoryController@getGameHistoryById');
