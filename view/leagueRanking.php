<?php
$pageTitle = "Ranking";

function customHeader()
{
    echo '<link rel="stylesheet" href="../../assets/css/ranking.css">';
}

include './view/components/header.php';

?>

<div class="rankingContainer">
    <div class="header">
        <a href="/">❮</a>
        <h1>Ranking Casual</h1>
    </div>
    <div class="tablesContainer">
        <div class="totalRankingContainer">
            <h2>Total</h2>
            <table>
                <thead>
                    <th>Usuário</th>
                    <th>Pontuação</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="weekRankingContainer">
            <h2>Semanal</h2>
            <table>
                <thead>
                    <th>Usuário</th>
                    <th>Pontuação</th>
                </thead>
                <tbody></tbody>
            </table>

        </div>

    </div>
</div>

<?php

function customFooter()
{
    echo '<script src="../assets/js/leagueRanking/index.js"></script>';
}

include './view/components/footer.php'

?>