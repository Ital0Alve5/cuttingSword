<?php
$pageTitle = "Ligas";

function customHeader()
{
    echo '<link rel="stylesheet" href="../../assets/css/leagues.css">';
}

include './view/components/header.php';

?>

<div class="leaguesContainer">
    <ul class="leaguesList"></ul>
</div>


<?php

function customFooter()
{
    echo '<script src="../assets/js/leagues.js"></script>';
}

include './view/components/footer.php'

?>