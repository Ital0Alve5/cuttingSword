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
        ");
    }

    private static function seedCasualGameHistory()
    {
        $sql = new Mysql();
        return $sql->executeQuery("
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 23, 1, 40, 'normal', '2023-11-08 11:21:26');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 13, 0, -10, 'hard', '2023-11-08 11:33:26');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 58, 0, -100, 'impossible', '2023-11-08 11:34:26');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (3, 50, 1, 70, 'easy', '2023-11-08 11:35:26');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (3, 45, 0, -20, 'very hard', '2023-11-08 11:36:26');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 20, 1, 70, 'hard', '2023-11-08 11:42:26');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 40, 1, 80, 'hard', '2023-11-08 11:43:26');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 50, 1, 70, 'very hard', '2023-11-08 11:44:26');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (2, 58, 0, -50, 'impossible', '2023-11-08 11:45:26');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (1, 49, 1, 40, 'easy', '2023-11-08 11:46:26');
            INSERT INTO CasualGameHistory(userId, timeLeft, victory, matchPoints, matchLevel, date) VALUES (3, 30, 0, -12, 'hard', '2023-11-08 11:47:26');
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
        ");
    }


    private static function seedLeagueGameHistory()
    {
        $sql = new Mysql();
        return $sql->executeQuery("
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, date) VALUES (1, 1, 23, 1, 40, '2023-11-08 11:21:26');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, date) VALUES (2, 2, 23, 1, 40, '2023-11-08 11:22:26');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, date) VALUES (1, 3, 23, 0, -40, '2023-11-08 11:23:26');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, date) VALUES (2, 3, 24, 1, 40, '2023-11-08 11:24:26');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, date) VALUES (1, 1, 23, 0, -10, '2023-11-08 11:25:26');
            INSERT INTO LeagueGameHistory(leagueId, userId, timeLeft, victory, matchPoints, date) VALUES (2, 1, 23, 1, 40, '2023-11-08 11:26:26');
        ");
    }
}
