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

//entry
Router::get('/entry', 'EntryController@index');

//leagues
Router::get('/leagues', 'LeagueController@index');

//createleague
Router::get('createLeague','CreateLeagueController@index');