<?php

// Home
Router::get('/', 'controllers\web\HomeController@index');
Router::get('/home', 'controllers\web\HomeController@index');

// Game
Router::get('/game', 'controllers\web\GameController@index');

//history
Router::get('/history', 'controllers\web\HistoryController@index');

//ranking
Router::get('/ranking/league', 'controllers\web\RankingController@leagueRanking');
Router::get('/ranking', 'controllers\web\RankingController@casualRanking');

//entry
Router::get('/entry', 'controllers\web\EntryController@index');

//leagues
Router::get('/leagues', 'controllers\web\LeagueController@leaguesList');
Router::get('/leagues/entry', 'controllers\web\LeagueController@entryLeagues');

//profile
Router::get('/profile', 'controllers\web\ProfileController@index');
