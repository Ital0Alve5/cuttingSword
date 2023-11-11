<?php

class Leagues
{
    private $id;
    private $creatorId;
    private $name;
    private $secretKey;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setCreatorId($creatorId)
    {
        $this->creatorId = $creatorId;
    }

    public function getCreatorId()
    {
        return $this->creatorId;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSecretKey($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    public function getSecretKey()
    {
        return $this->secretKey;
    }


    public function updateLeagueById($id, $creatorId, $name, $secretKey)
    {
        $sql = new Mysql();

        return $sql->executeQuery(
            "UPDATE Leagues SET creatorId = :CREATOR_ID, name = :NAME, secretKey = :SECRET_KEY WHERE id = :ID;",
            array(
                ":ID" => $id,
                ":CREATOR_ID" => $creatorId,
                ":NAME" => $name,
                "SECRET_KEY" => $secretKey
            )
        )->rowCount();
    }


    public function deleteLeagueById($id)
    {
        $sql = new Mysql();

        return $sql->executeQuery("DELETE FROM Leagues WHERE id = :ID;", array(":ID" => $id,))->rowCount();
    }


    public static function createLeague($creatorId, $name, $secretKey)
    {
        $sql = new Mysql();

        $sql->executeQuery("INSERT INTO Leagues(creatorId, name, secretKey) VALUES (:CREATOR_ID, :NAME, :SECRET_KEY);", array(
            ":CREATOR_ID" => $creatorId,
            ":NAME" => $name,
            ":SECRET_KEY" => $secretKey
        ));

        return $sql->getConnection()->lastInsertId();
    }


    public static function getAllLeaguesList()
    {
        $sql = new Mysql();

        $results = $sql->select("SELECT * FROM Leagues ORDER BY id ASC;");

        return $results;
    }

    public function loadLeagueById($id)
    {
        $sql = new Mysql();

        $results = $sql->select("SELECT * FROM Leagues WHERE id = :ID;", array(":ID" => $id));

        if (count($results) > 0) {
            $row = $results[0];
            $this->setId($row['id']);
            $this->setCreatorId($row['creatorId']);
            $this->setName($row['name']);
            $this->setSecretKey($row['secretKey']);
        }
    }


    public function loadLeagueByName($name)
    {
        $sql = new Mysql();

        $results = $sql->select("SELECT * FROM Leagues WHERE name = :NAME;", array(":NAME" => $name));

        if (count($results) > 0) {
            $row = $results[0];
            $this->setId($row['id']);
            $this->setCreatorId($row['creatorId']);
            $this->setName($row['name']);
            $this->setSecretKey($row['secretKey']);
        }
    }

    public static function getLeaguesListByCreatorId($creatorId)
    {
        $sql = new Mysql();

        $results = $sql->select("SELECT * FROM Leagues WHERE creatorId = :CREATOR_ID;", array(":CREATOR_ID" => $creatorId));

        return $results;
    }

    public function __toString()
    {
        return json_encode(array(
            "id" => $this->getId(),
            "creatorId" => $this->getCreatorId(),
            "name" => $this->getName(),
            "secretKey" => $this->getSecretKey(),
        ));
    }
}
