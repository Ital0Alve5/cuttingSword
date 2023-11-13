<?php

//Leagues
Router::get('/league/{leagueId}', 'LeagueController@getLeagueNameByLeagueId');
Router::get('/user/leagues', 'LeagueController@getUserLeagues');


// History
Router::get('/user/history', 'HistoryController@getGlobalGameHistory');


// Login
Router::post('/login', 'LoginController@index');

//Signup
Router::post('/signup', 'SignupController@index');


//Ranking
Router::get('/ranking/total/{leagueId}}', 'RankingController@getTotalRanking');
Router::get('/ranking/week/{leagueId}}', 'RankingController@getWeekRanking');


//logout
Router::get('/logout', 'LogoutController@index');


//createleague
Router::post('/entryLeague', 'createLeagueController@createLeague');