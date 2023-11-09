<?php
$pageTitle = "Game";

function customHeader(){
    echo '<link rel="stylesheet" href="../../assets/css/game/index.css">';
}

include './view/components/header.php';

?>

<div class="game">
    <p class="tutorial activeFlex">
        Use ← ↑ → ↓ and press Enter to choose an option.
    </p>
    <div class="container">
        <ul class="playersQuantity">
            <li class="choice" data-options="1">1 player</li>
            <li class="twoPlayers" data-options="2">2 players</li>
        </ul>
        <ul class="difficultyLevel">
            <li data-options="3">easy</li>
            <li data-options="2" class="choice">normal</li>
            <li data-options="1.5">hard</li>
            <li data-options="1">very hard</li>
            <li data-options="0.1">impossible</li>
        </ul>
        <div class="start" data-options="start">
            <p class="tutorialOnePlayer">You are the left player.</p>
            <p>
                The left player uses <strong>W, A, S, D</strong> to move and
                <strong>SPACE</strong> to hit.
            </p>
            <p class="tutorialTwoPlayers">
                The right player uses <strong>← ↑ → ↓</strong> to move and
                <strong>Enter</strong> to hit
            </p>
            <p>Now, press <strong>ENTER</strong> to start the game.</p>
        </div>
        <div class="startTimer">3</div>
        <div class="gameOver"></div>
        <div class="topBar">
            <div class="playerHealthContainer playerOne">
                <div class="playerHealth"></div>
            </div>
            <div class="timer"><span></span></div>
            <div class="playerHealthContainer playerTwo">
                <div class="playerHealth"></div>
            </div>
        </div>
        <canvas class="screen"></canvas>
    </div>
</div>

<?php

function customFooter()
{
    echo '<script type="module" src="../assets/js/game/Main.js"></script>';
}

include './view/components/footer.php'

?>