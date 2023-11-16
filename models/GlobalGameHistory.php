<?php

namespace models;

use models\db\Mysql;

class GlobalGameHistory
{
    public static function getGlobalGameHistoryByUserId($userId)
    {
        $sql = new Mysql();
        $results = $sql->select(
            "SELECT u.name as 'userName', 
            NULL as 'leagueName', 
            h.victory as 'victory', 
            h.matchLevel as 'level', 
            h.matchPoints as 'points', 
            h.timeleft as 'timeLeft', 
            h.date as 'date' 
            from CasualGameHistory as h 
            INNER JOIN Users as u 
            ON h.userId = u.id and u.id = :USER_ID 

            UNION

            SELECT u.name as 'userName', 
            l.name as 'leagueName', 
            lh.victory as 'victory', 
            lh.matchLevel as 'level', 
            lh.matchPoints as 'points', 
            lh.timeleft 'timeLeft', 
            lh.date  as 'date' from 
            (
                (
                    Users as u 
                    INNER JOIN LeagueGameHistory as lh 
                    ON lh.userId = u.id and u.id = :USER_ID
                ) INNER JOIN Leagues as l 
                  on l.id = lh.userId
            )
            
            ORDER BY date DESC;",
            array(":USER_ID" => $userId)
        );

        foreach ($results as &$result)
            $result['date'] = date('d/m/Y H:i:s', strtotime($result['date']));


        return $results;
    }
}
