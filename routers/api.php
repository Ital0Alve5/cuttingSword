<?php

//Leagues
Router::get('/league/{leagueId}', 'controllers\api\LeagueController@getLeagueNameByLeagueId');
Router::get('/user/leagues', 'controllers\api\LeagueController@getUserLeagues');


// History
Router::get('/user/history', 'controllers\api\HistoryController@getGlobalGameHistory');


// Login
Router::post('/login', 'controllers\api\LoginController@index');

//Signup
Router::post('/signup', 'controllers\api\SignupController@index');


//Ranking
Router::get('/ranking/total/{leagueId}}', 'controllers\api\RankingController@getTotalRanking');
Router::get('/ranking/week/{leagueId}}', 'controllers\api\RankingController@getWeekRanking');


//logout
Router::get('/logout', 'controllers\api\LogoutController@index');
