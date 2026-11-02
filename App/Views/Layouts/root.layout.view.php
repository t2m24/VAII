<?php

/** @var string $contentHTML */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hudobná knižnica a správa playlistov">
    <title><?= App\Configuration::APP_NAME ?></title>
    <link rel="stylesheet" href="<?= $link->asset('css/style.css') ?>">
</head>
<body>
<header class="site-header">
    <div class="header-inner">
        <a class="brand" href="<?= $link->url('home.index') ?>" aria-label="Hudobná knižnica - úvod">
            <img class="site-logo" src="<?= $link->asset('images/logo.png') ?>" alt="">
            <span>Hudobná knižnica</span>
        </a>

        <form class="header-search" role="search">
            <label class="sr-only" for="site-search">Vyhľadávanie</label>
            <input class="search-field" id="site-search" type="search" placeholder="Hľadať">
        </form>

        <nav class="main-nav" aria-label="Hlavná navigácia">
            <a href="<?= $link->url('home.index') ?>">Katalóg</a>
            <a href="#">Playlisty</a>
            <a href="#">Moja hudba</a>
            <a href="#">Prihlásiť sa</a>
        </nav>
    </div>
</header>

<main>
    <?= $contentHTML ?>
</main>

<footer class="site-footer">
    <span>Pätička</span>
</footer>
</body>
</html>
