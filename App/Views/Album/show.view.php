<?php

/** @var \App\Models\Album $album */
/** @var \App\Models\Song[] $songs */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="catalog" aria-labelledby="album-title">
    <div class="page-heading">
        <div>
            <p class="eyebrow">Detail albumu</p>
            <h1 id="album-title"><?= e($album->title) ?></h1>
            <p class="artist-name"><?= e($album->artist) ?></p>
        </div>
        <div class="song-actions">
            <a class="button primary-button" href="<?= $link->url('album.edit', ['id' => $album->id]) ?>">Upraviť album</a>
            <a class="button" href="<?= $link->url('album.index') ?>">Späť na albumy</a>
        </div>
    </div>

    <dl class="album-meta">
        <dt>Rok vydania</dt>
        <dd><?= e($album->release_year ?? 'Neuvedený') ?></dd>
    </dl>

    <h2 class="section-title">Skladby v albume</h2>
    <?php if (count($songs) === 0) { ?>
        <div class="empty-state">
            <p>Tento album zatiaľ neobsahuje žiadne skladby.</p>
        </div>
    <?php } else { ?>
        <div class="song-table-wrapper">
            <table class="song-table">
                <caption class="sr-only">Skladby v albume <?= e($album->title) ?></caption>
                <thead>
                <tr>
                    <th scope="col">Názov</th>
                    <th scope="col">Žáner</th>
                    <th scope="col">Rok vydania</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($songs as $song) { ?>
                    <tr>
                        <th scope="row">
                            <a class="song-link" href="<?= $link->url('home.song', ['id' => $song->id]) ?>">
                                <?= e($song->title) ?>
                            </a>
                        </th>
                        <td><?= e($song->genre ?? '—') ?></td>
                        <td><?= e($song->release_year ?? '—') ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</section>
