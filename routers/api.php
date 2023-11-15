<?php

//Leagues
Router::get('/league/{leagueId}', 'controllers\api\LeagueController@getLeagueNameByLeagueId');
Router::get('/leagues/list', 'controllers\api\LeagueController@getUserLeagues');
Router::post('/leagues/create', 'controllers\api\LeagueController@createLeague');
Router::post('/leagues/login', 'controllers\api\LeagueController@loginLeague');
Router::get('leagues/info', 'controllers\api\LeagueController@infoLeague');

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


//user
Router::get('/user/info', 'controllers\api\UserController@getLoggedUserInfo');
