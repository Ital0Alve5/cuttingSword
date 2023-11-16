<?php

//Leagues
Router::get('/league/{leagueId}', 'controllers\api\LeagueController@getLeagueNameByLeagueId');
Router::get('/leagues/list', 'controllers\api\LeagueController@getUserLeagues');
Router::post('/leagues/create', 'controllers\api\LeagueController@createLeague');
Router::post('/leagues/login', 'controllers\api\LeagueController@loginLeague');
Router::post('/leagues/join', 'controllers\api\LeagueController@joinLeague');
Router::get('/leagues/exit', 'controllers\api\LeagueController@exitLeague');
Router::get('/leagues/info', 'controllers\api\LeagueController@infoLeague');

// History
Router::get('/user/history', 'controllers\api\HistoryController@getGlobalGameHistory');


// Login
Router::post('/login', 'controllers\api\LoginController@index');

//Signup
Router::post('/signup', 'controllers\api\SignupController@index');


//Ranking
Router::get('/ranking/casual/total', 'controllers\api\RankingController@getCasualTotalRanking');
Router::get('/ranking/casual/week', 'controllers\api\RankingController@getCasualWeekRanking');
Router::get('/ranking/league/total', 'controllers\api\RankingController@getLeagueTotalRanking');
Router::get('/ranking/league/week', 'controllers\api\RankingController@getLeagueWeekRanking');


//logout
Router::get('/logout', 'controllers\api\LogoutController@index');

//user
Router::get('/user/info', 'controllers\api\UserController@getLoggedUserInfo');

//game
Router::post('/game/metrics', 'controllers\api\GameController@index');
