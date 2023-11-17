<?php

namespace models\db;

use \PDO;

class Mysql extends PDO
{

    private $connection;

    public function __construct()
    {
        $this->setUpDatabase();
    }


    public function setUpDatabase()
    {

        $this->connection = new PDO("mysql:host=localhost", "root", "root");

        if (!$this->connection) die('Erro ao iniciar conexão com o servidor de banco de dados');

        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $databases = $this->connection->query('show databases')->fetchAll(PDO::FETCH_COLUMN);

        if (in_array("cuttingSword", $databases)) $this->connection = new PDO("mysql:host=localhost;dbname=cuttingSword", "root", "root");
        else {
            if (!$this->createDatabase()) die('Erro ao criar banco de dados');
            if (!$this->useDatabase()) die('Erro ao usar banco de dados');
            if (!$this->createTables()) die('Erro ao criar tabelas');
            Seed::seedDatabase();
        }
    }

    private function createDatabase()
    {
        if (!$this->executeQuery("CREATE DATABASE IF NOT EXISTS cuttingSword")) return false;

        $this->connection = new PDO("mysql:host=localhost;dbname=cuttingSword", "root", "root");
        return true;
    }

    private function useDatabase()
    {
        return $this->executeQuery("use cuttingSword");
    }

    private function createTables()
    {
        return $this->executeQuery("
        CREATE TABLE IF NOT EXISTS Users(
            id INTEGER NOT NULL AUTO_INCREMENT,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(200) NOT NULL,
            password CHAR(32) NOT NULL,
            CONSTRAINT pk_users PRIMARY KEY (id)
        );
        CREATE TABLE IF NOT EXISTS CasualGameHistory(
            id INTEGER NOT NULL AUTO_INCREMENT,
            userId INTEGER NOT NULL,
            victory BOOLEAN,
            timeLeft INTEGER,
            matchLevel VARCHAR(15),
            matchPoints INTEGER,
            date TIMESTAMP UNIQUE,
            CONSTRAINT pk_casualGameHistory PRIMARY KEY (id),
            CONSTRAINT fk_userGlobalHistory FOREIGN KEY (userId) REFERENCES Users(id)
        );
        CREATE TABLE IF NOT EXISTS Leagues(
            id INTEGER NOT NULL AUTO_INCREMENT,
            creatorId INTEGER NOT NULL,
            name VARCHAR(50) NOT NULL,
            secretKey CHAR(32),
            CONSTRAINT pk_leagues PRIMARY KEY (id),
            CONSTRAINT fk_leagueCreatorId FOREIGN KEY (creatorId) REFERENCES Users(id)
        );
        CREATE TABLE IF NOT EXISTS UserLeagues(
            leagueId INTEGER NOT NULL,
            userId INTEGER NOT NULL,
            CONSTRAINT fk_leagueId FOREIGN KEY (leagueId) REFERENCES Leagues(id),
            CONSTRAINT fk_userId FOREIGN KEY (userId) REFERENCES Users(id),
            CONSTRAINT pk_userLeagues PRIMARY KEY (leagueId, userId)
        );
        CREATE TABLE IF NOT EXISTS LeagueGameHistory(
            leagueId INTEGER NOT NULL,
            userId INTEGER NOT NULL,
            victory BOOLEAN,
            timeLeft INTEGER,
            matchLevel VARCHAR(15),
            matchPoints INTEGER,
            date TIMESTAMP,
            CONSTRAINT fk_leagueIdHistory FOREIGN KEY (leagueId) REFERENCES Leagues(id),
            CONSTRAINT fk_leagueUserHistory FOREIGN KEY (userId) REFERENCES Users(id),
            CONSTRAINT pk_leagueGameHistory PRIMARY KEY (leagueId, userId, date)
        );
        ");
    }

    private function setParams($statement, $params = array()): void
    {
        foreach ($params as $key => $value) {
            $this->setParam($statement, $key, $value);
        }
    }

    private function setParam($statement, $key, $value): void
    {
        $statement->bindParam($key, $value);
    }

    public function executeQuery($rawQuery, $params = array()): object
    {
        $statement = $this->connection->prepare($rawQuery);

        $this->setParams($statement, $params);

        $statement->execute();

        return $statement;
    }

    public function select($rawQuery, $params = array()): array
    {
        $statement = $this->executeQuery($rawQuery, $params);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
