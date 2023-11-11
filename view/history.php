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
    <div class="tableContainer">
        <table>
            <thead>
                <th>Usuário</th>
                <th>Modo</th>
                <th>Vitória</th>
                <th>Nível</th>
                <th>Pontos</th>
                <th>Tempo restante</th>
                <th>Data</th>
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