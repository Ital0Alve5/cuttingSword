<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <title><?= isset($pageTitle) ? $pageTitle : 'CuttingSword' ?></title>
    <?php if (function_exists('customPageHeader')) {
        customPageHeader();
    } ?>
</head>

<body>