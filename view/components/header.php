<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle : 'CuttingSword' ?></title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <?php if (function_exists('customHeader')) {
        customHeader();
    } ?>
</head>

<body>