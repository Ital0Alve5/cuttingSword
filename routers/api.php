<?php

//Teste
Router::get('/teste', 'TesteController@getUser');
Router::post('/teste', 'TesteController@login');

//Leagues
Router::get('/league/{leagueId}', 'LeagueController@getLeagueNameByLeagueId');


// History
Router::get('/history/{userId}', 'HistoryController@getGlobalGameHistory');


//Ranking
Router::get('/ranking/total/{leagueId}}', 'RankingController@getTotalRanking');
Router::get('/ranking/week/{leagueId}}', 'RankingController@getWeekRanking');
