<?php

class UserLeagues
{
    public static function getUserLeaguesListByUserId($userId)
    {
        $sql = new Mysql();
        $results = $sql->select("SELECT * FROM UserLeagues WHERE userId = :USER_ID", array(":USER_ID" => $userId));
        return $results;
    }

    public static function isUserPartOfLeague($userId, $leagueId)
    {
        $sql = new Mysql();
        $results = $sql->select("SELECT * FROM UserLeagues WHERE userId = :USER_ID AND leagueId = :LEAGUE_ID;", array(":USER_ID" => $userId, ":LEAGUE_ID" => $leagueId));
        return count($results) > 0;
    }
}
