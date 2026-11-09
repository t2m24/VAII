<?php

/** @var \App\Models\Album[] $albums */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="catalog" aria-labelledby="album-title">
    <div class="page-heading">
        <div>
            <p class="eyebrow">Hudobná knižnica</p>
            <h1 id="album-title">Albumy</h1>
        </div>
        <a class="button primary-button" href="<?= $link->url('album.create') ?>">Pridať nový album</a>
    </div>

    <?php if (count($albums) === 0) { ?>
        <div class="empty-state">
            <p>V knižnici zatiaľ nie sú žiadne albumy.</p>
            <a href="<?= $link->url('album.create') ?>">Pridajte prvý album</a>
        </div>
    <?php } else { ?>
        <div class="song-table-wrapper">
            <table class="song-table">
                <caption class="sr-only">Zoznam albumov</caption>
                <thead>
                <tr>
                    <th scope="col">Názov</th>
                    <th scope="col">Interpret</th>
                    <th scope="col">Rok vydania</th>
                    <th scope="col">Počet skladieb</th>
                    <th scope="col"><span class="sr-only">Akcie</span></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($albums as $album) { ?>
                    <?php $songCount = count($album->getSongs()); ?>
                    <tr>
                        <th scope="row">
                            <a class="song-link" href="<?= $link->url('album.show', ['id' => $album->id]) ?>">
                                <?= e($album->title) ?>
                            </a>
                        </th>
                        <td><?= e($album->artist) ?></td>
                        <td><?= e($album->release_year ?? '—') ?></td>
                        <td><?= e($songCount) ?></td>
                        <td class="table-actions">
                            <a class="button small-button" href="<?= $link->url('album.edit', ['id' => $album->id]) ?>">
                                Upraviť
                            </a>
                            <form method="post" action="<?= $link->url('album.delete', ['id' => $album->id]) ?>">
                                <button class="small-button danger-button" type="submit">Vymazať</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</section>
