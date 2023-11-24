<?php
$pageTitle = "Game";

function customHeader()
{
    echo '<link rel="stylesheet" href="../../assets/css/game/index.css">';
}

include './view/components/header.php';

?>

<div class="game">
    <p class="tutorial activeFlex">
        Use ← ↑ → ↓ e pressione ENTER para escolher uma opção.
    </p>
    <div class="container">
        <ul class="playersQuantity">
            <li class="choice" data-options="1">1 player (ranqueada)</li>
            <li class="twoPlayers" data-options="2">2 players</li>
        </ul>
        <ul class="difficultyLevel">
            <li data-options="3">Fácil</li>
            <li data-options="2" class="choice">Normal</li>
            <li data-options="1.5">Difícil</li>
            <li data-options="1">Muito Difícil</li>
            <li data-options="0.1">Impossível</li>
        </ul>
        <div class="start" data-options="start">
            <p class="tutorialOnePlayer">Você é o jogador da esquerda.</p>
            <p>
                O jogador da esquerda se move usando <strong>W, A, S, D</strong> e
                ataca usando o <strong>ESPAÇO</strong>.
            </p>
            <p class="tutorialTwoPlayers">
                O jogador da direita se move com <strong>← ↑ → ↓</strong> e
                ataca usando o <strong>ENTER</strong>.
            </p>
            <p>Pressione <strong>ENTER</strong> para começar o jogo.</p>
        </div>
        <div class="startTimer">3</div>
        <div class="gameOver">
            <span class="playerWinner"></span>
            <span class="points"></span>
            <p class="playAgain">Aperte ENTER para jogar novamente!</p>
        </div>
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