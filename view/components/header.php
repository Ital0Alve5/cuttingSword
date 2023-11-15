<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle : 'CuttingSword' ?></title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
    <style>
    </style>
    <?php if (function_exists('customHeader')) {
        customHeader();
    } ?>
</head>

<body>
    <header>
        <nav>
            <ul class="menu">
                <li><a href="/">Home</a></li>
                <li><a href="/game">Jogar</a></li>
                <li class="dropdown">
                    <span>Ranking ▼</span>
                    <ul class="sublist">
                        <li class="subItem"><a href="#">Ranking Global</a></li>
                        <li class="subItem"><a href="#">Ranking da Liga</a></li>
                    </ul>
                </li>
                <li><a href="/leagues">Ligas</a></li>
                <li><a href="/history">Histórico</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
            <span class="userName"></span>
            <div class="menuBurger">MENU</div>
        </nav>
    </header>