<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" href="<?= url("assets/images/favicon.ico") ?>">
    <link rel="stylesheet" href="<?= url("assets/css/bootstrap/bootstrap-reboot.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("assets/css/bootstrap/bootstrap-grid.min.css"); ?>">
    <link rel="stylesheet" href="<?= url("assets/css/bootstrap/bootstrap.min.css"); ?>">
    <?php if(isset($additionalStyles) && $additionalStyles): ?>
        <link rel="stylesheet" href="<?= url("assets/css/sigin.css"); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?= url("assets/css/style.css"); ?>">
    <title><?= $title ?? "Notes" ?></title>
</head>
<body>



