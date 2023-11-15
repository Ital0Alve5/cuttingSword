<?php
$pageTitle = "Histórico";

function customHeader()
{
    echo '<link rel="stylesheet" href="../../assets/css/history.css">';
}

include './view/components/header.php';

?>

<div class="historyContainer">
    <div class="header">
        <a href="/profile">❮</a>
        <h1>Histórico do jogo</h1>
    </div>
    <div class="tableContainer">
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
</div>

<?php

function customFooter()
{
    echo '<script src="../assets/js/history.js"></script>';
}

include './view/components/footer.php'

?>