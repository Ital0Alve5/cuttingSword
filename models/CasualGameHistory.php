<?php

class CasualGameHistory
{
    private $id;
    private $userId;
    private $timeLeft;
    private $victory;
    private $matchPoints;
    private $matchLevel;
    private $date;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
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

    public static function getUserHistoryByUserId($userId)
    {
        $sql = new Mysql();
        $results = $sql->select("SELECT * FROM CasualGameHistory WHERE userId = :USER_ID ORDER BY date ASC", array(":USER_ID" => $userId));
        return $results;
    }

    public static function createUserHistory($userId, $timeLeft, $victory, $matchPoints, $matchLevel)
    {
        $sql = new Mysql();
        $date = (new Datetime('now'))->format('Y-m-d H:i:s');

        $sql->executeQuery("INSERT INTO CasualGameHistory(
            userId, timeLeft, victory, matchPoints, matchLevel, date
            ) 
            VALUES (
                :USER_ID, :TIME_LEFT, :VICTORY, :MATCH_POINTS, :MATCH_LEVEL, :DATE
                )", array(
            ":USER_ID" => $userId,
            ":TIME_LEFT" => $timeLeft,
            ":VICTORY" => $victory,
            ":MATCH_POINTS" => $matchPoints,
            ":MATCH_LEVEL" => $matchLevel,
            ":DATE" => $date
        ));

        return $sql->getConnection()->lastInsertId();
    }

    public function loadUserGlobalHistoryById($id)
    {
        $sql = new Mysql();
        $results = $sql->select("SELECT * FROM CasualGameHistory WHERE id = :ID", array(":ID" => $id));
        if (count($results) > 0) {
            $row = $results[0];
            $this->setId($row['id']);
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
            "userId" => $this->getUserId(),
            "timeLeft" => $this->getTimeLeft(),
            "victory" => $this->getVictory(),
            "matchPoints" => $this->getMatchPoints(),
            "matchLevel" => $this->getMatchLevel(),
            "date" => $this->getDate(),
        ));
    }
}
