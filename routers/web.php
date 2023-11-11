<?php

// Home
Router::get('/', 'HomeController@index');
Router::get('/home', 'HomeController@index');

// Game
Router::get('/game', 'GameController@index');

//history
Router::get('/history', 'HistoryController@index');

//ranking
Router::get('/ranking', 'RankingController@index');
Router::get('/ranking/{leagueId}', 'RankingController@index');
