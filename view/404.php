<?php
$pageTitle = "404";

function customHeader()
{
    echo '<link rel="stylesheet" href="../../assets/css/404.css">';
}

include './view/components/header.php';

?>

<div class="notFoundContainer">
    <h1>Página não encontrada!</h1>
    <p>404</p>
    <a href="/">Voltar para a home</a>
</div>


<?php include './view/components/footer.php' ?>