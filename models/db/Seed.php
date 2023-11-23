<?php

namespace models\db;

class Seed
{
    public static function seedDatabase()
    {
        Seed::seedUsers();
        Seed::seedCasualGameHistory();
        Seed::seedLeagues();
        Seed::seedUserLeagues();
        Seed::seedLeagueGameHistory();
    }

    private static function seedUsers()
    {
        $sql = new Mysql();
        return $sql->executeQuery("
            INSERT INTO Users(name, email, password) VALUES ('italo', 'italo_alves_@outlook.com', 'e10adc3949ba59abbe56e057f20f883e'); 
            INSERT INTO Users(name, email, password) VALUES ('yasmim', 'yasmim_zedelinski@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
            INSERT INTO Users(name, email, password) VALUES ('heitor', 'heitor@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
            INSERT INTO Users(name, email, password) VALUES ('alexTop', 'alexTop@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
            INSERT INTO Users(name, email, password) VALUES ('cris', 'cris@outlook.com', 'e10adc3949ba59abbe56e057f20f883e');
            INSERT INTO Users(name, email, password) VALUES ('luciano', 'lugg.alves@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
            INSERT INTO Users(name, email, password) VALUES ('mister', 'mister@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
            INSERT INTO Users(name, email, password) VALUES ('usuario1', 'usuario1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
            INSERT INTO Users(name, email, password) VALUES ('usuario2', 'usuario2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
        ");
    }

    private static function seedCasualGameHistory()
    {
        $sql = new Mysql();
        return $sql->executeQuery("
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 23, 1, 30, 'Normal', '2023-12-09 12:21:28');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 13, 0, -60, 'Difícil', '2023-12-08 11:53:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (3, 58, 0, -700, 'Impossível', '2023-12-08 11:34:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (4, 50, 1, 80, 'Fácil', '2023-12-08 11:35:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (5, 45, 0, -10, 'Muito Difícil', '2023-12-08 11:36:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (6, 20, 1, 60, 'Difícil', '2023-12-08 11:42:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (7, 40, 1, 85, 'Difícil', '2023-12-08 11:43:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 50, 1, 90, 'Muito Difícil', '2023-12-08 11:44:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 58, 0, -20, 'Impossível', '2023-12-08 11:45:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (3, 49, 1, 30, 'Fácil', '2023-12-08 11:46:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (4, 30, 0, -25, 'Difícil', '2023-12-08 11:47:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (6, 13, 0, -20, 'Difícil', '2023-11-08 11:33:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (7, 58, 0, -100, 'Impossível', '2023-11-08 11:24:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 50, 1, 80, 'Fácil', '2023-11-08 11:35:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 45, 0, -10, 'Muito Difícil', '2023-11-08 11:36:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (3, 20, 1, 30, 'Difícil', '2023-11-08 11:42:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (4, 40, 1, 20, 'Difícil', '2023-11-08 11:43:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (5, 50, 1, 70, 'Muito Difícil', '2023-11-08 11:44:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (6, 58, 0, -50, 'Impossível', '2023-11-08 11:45:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (7, 49, 1, 40, 'Fácil', '2023-11-08 11:46:27');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (8, 30, 0, -15, 'Difícil', '2023-11-08 11:47:27');
        ");
    }

    private static function seedLeagues()
    {
        $sql = new Mysql();
        return $sql->executeQuery("
            INSERT INTO Leagues(creatorId, name, secretKey) VALUES (1, 'ligateste1', 'e10adc3949ba59abbe56e057f20f883e');
            INSERT INTO Leagues(creatorId, name, secretKey) VALUES (2, 'ligateste2', 'e10adc3949ba59abbe56e057f20f883e');
        ");
    }

    private static function seedUserLeagues()
    {
        $sql = new Mysql();
        return $sql->executeQuery("
            INSERT INTO UserLeagues(leagueId, userId) VALUES (1, 1);
            INSERT INTO UserLeagues(leagueId, userId) VALUES (1, 3);
            INSERT INTO UserLeagues(leagueId, userId) VALUES (2, 2);
            INSERT INTO UserLeagues(leagueId, userId) VALUES (2, 3);
            INSERT INTO UserLeagues(leagueId, userId) VALUES (2, 1);
            INSERT INTO UserLeagues(leagueId, userId) VALUES (1, 4);
            INSERT INTO UserLeagues(leagueId, userId) VALUES (2, 4);
            INSERT INTO UserLeagues(leagueId, userId) VALUES (1, 11);
            INSERT INTO UserLeagues(leagueId, userId) VALUES (2, 11);
            INSERT INTO UserLeagues(leagueId, userId) VALUES (1, 12);
            INSERT INTO UserLeagues(leagueId, userId) VALUES (2, 12);
        ");
    }


    private static function seedLeagueGameHistory()
    {
        $sql = new Mysql();
        return $sql->executeQuery("
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 1, 23, 1, 40, 'Difícil', '2023-11-21 11:21:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 2, 23, 1, 40, 'Impossível', '2023-11-21 11:22:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 3, 23, 0, -40, 'Fácil', '2023-11-22 11:23:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 4, 24, 1, 40, 'Normal', '2023-11-22 11:24:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 5, 23, 0, -10, 'Normal', '2023-11-23 11:25:16');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 6, 23, 1, 40, 'Normal', '2023-11-23 11:26:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 7, 23, 1, 40, 'Difícil', '2023-11-24 11:21:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 1, 23, 1, 40, 'Impossível', '2023-11-24 11:22:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 2, 23, 0, -40, 'Fácil', '2023-11-25 11:23:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 3, 24, 1, 40, 'Normal', '2023-11-25 11:24:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 4, 23, 0, -10, 'Normal', '2023-11-26 11:25:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 5, 23, 1, 40, 'Normal', '2023-11-26 11:26:16');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 6, 23, 1, 40, 'Difícil', '2023-11-20 11:21:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 7, 23, 1, 40, 'Impossível', '2023-11-20 11:22:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 1, 23, 0, -40, 'Fácil', '2023-11-19 11:23:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 2, 24, 1, 40, 'Normal', '2023-11-19 11:24:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 3, 23, 0, -10, 'Normal', '2023-11-18 11:25:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 4, 23, 1, 40, 'Normal', '2023-11-18 11:26:27');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 3, 23, 1, 30, 'Difícil', '2023-11-21 11:21:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 4, 23, 1, 10, 'Impossível', '2023-11-21 11:22:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 5, 23, 0, -50, 'Fácil', '2023-11-22 11:23:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 6, 24, 1, 100, 'Normal', '2023-11-22 11:24:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 7, 23, 0, -30, 'Normal', '2023-11-23 11:25:18');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 1, 23, 1, 30, 'Normal', '2023-11-23 11:26:28');
			INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 2, 23, 1, 75, 'Difícil', '2023-11-24 11:21:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 3, 23, 1, 35, 'Impossível', '2023-11-24 11:22:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 4, 23, 0, -10, 'Fácil', '2023-11-25 11:23:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 5, 24, 1, 85, 'Normal', '2023-11-25 11:24:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 6, 23, 0, -20, 'Normal', '2023-11-26 11:25:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 7, 23, 1, 30, 'Normal', '2023-11-26 11:26:18');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 1, 23, 1, 40, 'Difícil', '2023-11-20 11:21:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 2, 23, 1, 70, 'Impossível', '2023-11-20 11:22:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 3, 23, 0, -40, 'Fácil', '2023-11-19 11:23:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 4, 24, 1, 90, 'Normal', '2023-11-19 11:24:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 5, 23, 0, -10, 'Normal', '2023-11-18 11:25:28');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 6, 23, 1, 40, 'Normal', '2023-11-18 11:26:28');
        ");
    }
}
