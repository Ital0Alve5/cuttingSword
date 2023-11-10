<?php

class LeagueUsersHistory
{
    private $id;
    private $leagueId;
    private $userId;
    private $timeLeft;
    private $victory;
    private $matchLevel;
    private $matchPoints;
    private $date;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setLeagueId($leagueId)
    {
        $this->leagueId = $leagueId;
    }

    public function getLeagueId()
    {
        return $this->leagueId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setTimeLeft($timeLeft)
    {
        $this->timeLeft = $timeLeft;
    }

    public function getTimeLeft()
    {
        return $this->timeLeft;
    }

    public function setVictory($victory)
    {
        $this->victory = $victory;
    }

    public function getVictory()
    {
        return $this->victory;
    }

    public function setMatchPoints($matchPoints)
    {
        $this->matchPoints = $matchPoints;
    }

    public function getMatchPoints()
    {
        return $this->matchPoints;
    }

    public function setMatchLevel($matchLevel)
    {
        $this->matchLevel = $matchLevel;
    }

    public function getMatchLevel()
    {
        return $this->matchLevel;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public static function getUserLeagueHistoryList($leagueId, $userId)
    {
        $sql = new Mysql();
        $results = $sql->select("SELECT * FROM LeagueUsersHistory WHERE userId = :USER_ID AND leagueId = :LEAGUE_ID ORDER BY date ASC", array(":LEAGUE_ID" => $leagueId, ":USER_ID" => $userId));

        return $results;
    }

    public static function getUserLeaguesListByUserId($userId)
    {
        $leaguesList = [];

        $sql = new Mysql();
        $results = $sql->select("SELECT DISTINCT * FROM LeagueUsersHistory WHERE userId = :USER_ID ORDER BY leagueId ASC", array(":USER_ID" => $userId));
        if (count($results) > 0) {
            foreach ($results as $result) {
                $league = new Leagues();
                $league->loadLeagueById($result['leagueId']);

                array_push($leaguesList, $league);
            }
        }

        return $leaguesList;
    }

    public static function createLeagueUserHistory($leagueId, $userId, $timeLeft, $victory, $matchPoints, $matchLevel)
    {
        $sql = new Mysql();
        $date = (new Datetime('now'))->format('Y-m-d H:i:s');

        $sql->executeQuery("INSERT INTO LeagueUsersHistory(
            leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date
            ) 
            VALUES (
                :LEAGUE_ID, :USER_ID, :TIME_LEFT, :VICTORY, :MATCH_POINTS, :MATCH_LEVEL, :DATE
                )", array(
            ":LEAGUE_ID" => $leagueId,
            ":USER_ID" => $userId,
            ":TIME_LEFT" => $timeLeft,
            ":VICTORY" => $victory,
            ":MATCH_POINTS" => $matchPoints,
            ":MATCH_LEVEL" => $matchLevel,
            ":DATE" => $date
        ));

        return $sql->getConnection()->lastInsertId();
    }

    public function loadUserLeagueHistoryById($Id)
    {
        $sql = new Mysql();
        $results = $sql->select("SELECT * FROM GlobalUsersHistory WHERE id = :ID", array(":ID" => $Id));
        if (count($results) > 0) {
            $row = $results[0];
            $this->setId($row['id']);
            $this->setLeagueId($row['leagueId']);
            $this->setUserId($row['userId']);
            $this->setTimeLeft($row['timeLeft']);
            $this->setVictory($row['victory']);
            $this->setMatchPoints($row['matchPoints']);
            $this->setMatchLevel($row['matchLevel']);
            $this->setDate($row['date']);
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "id" => $this->getId(),
            "leagueId" => $this->getLeagueId(),
            "userId" => $this->getUserId(),
            "timeLeft" => $this->getTimeLeft(),
            "victory" => $this->getVictory(),
            "matchPoints" => $this->getMatchPoints(),
            "matchLevel" => $this->getMatchLevel(),
            "date" => $this->getDate(),
        ));
    }
}
