<?php
$pageTitle = "Histórico";

function customHeader()
{
    echo '<link rel="stylesheet" href="../../assets/css/history.css">';
}

include './view/components/header.php';

?>

<div class="historyContainer">
    <h1>Histórico do jogo</h1>
    <div class="tableContainer leagueTables">
        <table>
            <thead>
                <th>Usuário</th>
                <th>Modo</th>
                <th>Resultado</th>
                <th>Dificuldade</th>
                <th>Pontuação</th>
                <th>Tempo Restante</th>
                <th>Data e Hora</th>
            </thead>
            <tbody></tbody>
        </table>

    </div>
    <div class="warning"></div>
</div>

<?php

function customFooter()
{
    echo '<script src="../assets/js/history/index.js"></script>';
}

include './view/components/footer.php'

?>