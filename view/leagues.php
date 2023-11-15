<?php
$pageTitle = "Ligas";

function customHeader()
{
    echo '<link rel="stylesheet" href="../../assets/css/leagues.css">';
}

include './view/components/header.php';

?>

<div class="leaguesContainer">
    <h1>Ligas</h1>
    <div class="entryLeague">

        <form class="loginLeague">
            <ul class="errorContainer"></ul>
            <p>Entrar em uma liga:</p>
            <input class="leagueName" placeholder="Nome da Liga">
            <input class="password" placeholder="Palavra-chave da liga">
            <button>Procurar Liga</button>
        </form>
        <form class="createLeague">
            <ul class="errorContainer"></ul>
            <p>Criar nova liga:</p>
            <input class="leagueName" placeholder="Nome da sua nova liga">
            <input class="password" placeholder="Crie uma palavra-chave">
            <button>Criar nova Liga</button>
        </form>
    </div>
    <ul class="leaguesList"></ul>
</div>


<?php

function customFooter()
{
    echo '<script type="module" src="../assets/js/leagues/index.js"></script>';
}

include './view/components/footer.php'

?>