<?php

namespace models;

use models\db\Mysql;


class Ranking
{
    public static function getCasualTotalRanking()
    {
        $sql = new Mysql();
        $results = $sql->select(
            "SELECT u.name as userName, SUM(cg.matchPoints) AS points
        FROM
            CasualGameHistory as cg
        INNER JOIN 
            Users as u
            ON u.id = cg.userId
        GROUP BY
            u.name
        ORDER BY
            points DESC;"
        );

        return $results;
    }

    public static function getCasualWeekRanking()
    {
        $sql = new Mysql();
        $results = $sql->select(
            "SELECT
            u.name as userName,
            SUM(cg.matchPoints) AS points
        FROM
            CasualGameHistory as cg
        INNER JOIN 
            Users as u
            ON u.id = cg.userId
        WHERE 
            cg.date >= curdate() - INTERVAL 7 day AND cg.date < curdate()
        GROUP BY
            u.name
        ORDER BY
            points DESC;"
        );

        return $results;
    }

    public static function getLeagueTotalRanking($leagueId)
    {
        $sql = new Mysql();
        $results = $sql->select(
            "SELECT u.name as userName, SUM(lg.matchPoints) AS points
            FROM
                LeagueGameHistory as lg
            INNER JOIN 
                Users as u
                ON u.id = lg.userId
            WHERE lg.leagueId = :LEAGUE_ID
            GROUP BY
                u.name
            ORDER BY
                points DESC;",
            array(":LEAGUE_ID" => $leagueId)
        );

        return $results;
    }

    public static function getLeagueWeekRanking($leagueId)
    {
        $sql = new Mysql();
        $results = $sql->select(
            "SELECT u.name as userName, SUM(lg.matchPoints) AS points
            FROM
                LeagueGameHistory as lg
            INNER JOIN 
                Users as u
                ON u.id = lg.userId
            WHERE lg.date >= curdate() - INTERVAL 7 day AND lg.date < curdate() AND lg.leagueId = :LEAGUE_ID
            GROUP BY
                u.name
            ORDER BY
                points DESC;",
            array(":LEAGUE_ID" => $leagueId)
        );

        return $results;
    }
}
