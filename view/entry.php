<?php
$pageTitle = "Login/Cadastro";

function customHeader()
{
    echo '<link rel="stylesheet" href="../../assets/css/entry.css">';
}

include './view/components/header.php';

?>
<div class="entryContainer">
    <div class="formModal">
        <ul class="errorContainer"> </ul>
        <div class="formToggle">
            <button id="loginToggle">Login</button>
            <button id="signupToggle">Cadastro</button>
        </div>

        <div id="loginForm">
            <form>
                <input class="emailField" type="text" placeholder="Digite seu email" />
                <input class="passwordField" type="password" placeholder="Digite sua senha" />
                <button class="btn login">login</button>
            </form>
        </div>

        <div id="signupForm">
            <form>
                <input class="emailField" type="email" placeholder="Digite seu email" />
                <input class="userNameField" type="text" placeholder="Escolha um nome de usuário" />
                <input class="passwordField" type="password" placeholder="Crie uma senha" />
                <input class="confirmPasswordField" type="password" placeholder="Confirme sua senha" />
                <button class="btn signup">Cadastrar conta</button>
            </form>
        </div>

    </div>
</div>


<?php

function customFooter()
{

    echo '<script type=module src="../assets/js/entry/index.js"></script>';
}

include './view/components/footer.php'

?>