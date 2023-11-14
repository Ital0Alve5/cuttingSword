<?php

// Home
Router::get('/', 'controllers\web\HomeController@index');
Router::get('/home', 'controllers\web\HomeController@index');

// Game
Router::get('/game', 'controllers\web\GameController@index');

//history
Router::get('/history', 'controllers\web\HistoryController@index');

//ranking
Router::get('/ranking', 'controllers\web\RankingController@index');

//entry
Router::get('/entry', 'controllers\web\EntryController@index');

//leagues
Router::get('/leagues', 'controllers\web\LeagueController@leaguesList');
Router::get('/create/leagues', 'controllers\web\LeagueController@createLeague');
