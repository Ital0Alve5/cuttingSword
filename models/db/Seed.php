<?php

class Seed
{
    public static function seedDatabase()
    {
        Seed::seedUsers();
        Seed::seedGlobalUsersHistory();
        Seed::seedLeagues();
        Seed::seedLeagueUsersHistory();
    }

    private static function seedUsers()
    {
        $sql = new Mysql();
        return $sql->executeQuery("
            INSERT INTO Users(name, email, password) VALUES ('italo', 'italo_alves_@outlook.com', '220f4c072ce8221c1671f3534c8c4d53'); 
            INSERT INTO Users(name, email, password) VALUES ('yasmim', 'yasmim_zedelinski@gmail.com', 'e6024d562b44cbc3bea95825cace281d');
            INSERT INTO Users(name, email, password) VALUES ('heitor', 'heitor@gmail.com', '42599b6539f10802bcffd4290a39442c');
            INSERT INTO Users(name, email, password) VALUES ('alexTop', 'alexTop@gmail.com', '7610daf90b31bd9e9d9e2ef95e2ba204');
            INSERT INTO Users(name, email, password) VALUES ('cris', 'cris@outlook.com', '2a5f02807d62292692e5c965390fb4fc');
            INSERT INTO Users(name, email, password) VALUES ('luciano', 'lugg.alves@gmail.com', '53c7a448abe8577a8651af7b3c01f737');
            INSERT INTO Users(name, email, password) VALUES ('mister', 'mister@gmail.com', '23f1a95f11860b9c09510f680ac0a258');
        ");
    }

    private static function seedGlobalUsersHistory()
    {
        $sql = new Mysql();
        return $sql->executeQuery("
            INSERT INTO GlobalUsersHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 23, 1, 40, 'normal', '2023-11-08 11:21:26');
            INSERT INTO GlobalUsersHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 13, 0, -10, 'hard', '2023-11-08 11:33:26');
            INSERT INTO GlobalUsersHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 58, 0, -100, 'impossible', '2023-11-08 11:34:26');
            INSERT INTO GlobalUsersHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (3, 50, 1, 70, 'easy', '2023-11-08 11:35:26');
            INSERT INTO GlobalUsersHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (3, 45, 0, -20, 'very hard', '2023-11-08 11:36:26');
            INSERT INTO GlobalUsersHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 20, 1, 70, 'hard', '2023-11-08 11:42:26');
            INSERT INTO GlobalUsersHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 40, 1, 80, 'hard', '2023-11-08 11:43:26');
            INSERT INTO GlobalUsersHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 50, 1, 70, 'very hard', '2023-11-08 11:44:26');
            INSERT INTO GlobalUsersHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 58, 0, -50, 'impossible', '2023-11-08 11:45:26');
            INSERT INTO GlobalUsersHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 49, 1, 40, 'easy', '2023-11-08 11:46:26');
            INSERT INTO GlobalUsersHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (3, 30, 0, -12, 'hard', '2023-11-08 11:47:26');
        ");
    }

    private static function seedLeagues()
    {
        $sql = new Mysql();
        return $sql->executeQuery("
            INSERT INTO Leagues(creatorId, secretKey) VALUES (1, '04b6e1a104ba0ed5e7985abde3e13140');
            INSERT INTO Leagues(creatorId, secretKey) VALUES (2, '57285571deec8d096491da6f2bf7f2a6');
        ");
    }

    private static function seedLeagueUsersHistory()
    {
        $sql = new Mysql();
        return $sql->executeQuery("
            INSERT INTO LeagueUsersHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 1, 23, 1, 40, 'normal', '2023-11-08 11:21:26');
            INSERT INTO LeagueUsersHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 2, 23, 1, 40, 'hard', '2023-11-08 11:22:26');
            INSERT INTO LeagueUsersHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 3, 23, 0, -40, 'normal', '2023-11-08 11:23:26');
            INSERT INTO LeagueUsersHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 3, 24, 1, 40, 'hard', '2023-11-08 11:24:26');
            INSERT INTO LeagueUsersHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 1, 23, 0, -10, 'hard', '2023-11-08 11:25:26');
            INSERT INTO LeagueUsersHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 1, 23, 1, 40, 'very hard', '2023-11-08 11:26:26');
        ");
    }
}
