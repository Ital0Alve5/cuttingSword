<?php
$pageTitle = "Home";

function customHeader()
{
    echo '<link rel="stylesheet" href="../../assets/css/home.css">';
}

include './view/components/header.php'

?>

<main>
    <h1>Cutting Sword</h1>
    <button class="playNow">
        Jogue Agora
    </button>
</main>

<?php
    echo '<script src="../assets/js/home/index.js"></script>';

    include './view/components/footer.php'
?>