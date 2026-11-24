<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Song[] $songs */
?>
<section class="catalog" aria-labelledby="catalog-title">
    <div class="page-heading">
        <div>
            <p class="eyebrow">Hudobná knižnica</p>
            <h1 id="catalog-title">Katalóg skladieb</h1>
        </div>
        <a class="button primary-button" href="<?= $link->url('home.create') ?>">Pridať novú skladbu</a>
    </div>

    <?php if (count($songs) === 0) { ?>
        <div class="empty-state">
            <p>V katalógu zatiaľ nie sú žiadne skladby.</p>
            <a href="<?= $link->url('home.create') ?>">Pridajte prvú skladbu</a>
        </div>
    <?php } else { ?>
        <div class="catalog-controls" data-catalog-controls>
            <div class="form-field">
                <label for="catalog-search">Hľadať skladbu</label>
                <input id="catalog-search" type="search" data-filter="search"
                       placeholder="Názov, interpret, album alebo žáner">
            </div>
            <div class="form-field">
                <label for="catalog-genre">Žáner</label>
                <select id="catalog-genre" data-filter="genre">
                    <option value="">Všetky žánre</option>
                </select>
            </div>
            <div class="form-field">
                <label for="catalog-year-from">Rok od</label>
                <input id="catalog-year-from" type="number" min="0" max="2100" data-filter="year-from">
            </div>
            <div class="form-field">
                <label for="catalog-year-to">Rok do</label>
                <input id="catalog-year-to" type="number" min="0" max="2100" data-filter="year-to">
            </div>
            <div class="form-field">
                <label for="catalog-sort">Zoradiť</label>
                <select id="catalog-sort" data-filter="sort">
                    <option value="original">Pôvodné poradie</option>
                    <option value="title-asc">Názov (A – Z)</option>
                    <option value="title-desc">Názov (Z – A)</option>
                    <option value="artist-asc">Interpret (A – Z)</option>
                    <option value="year-desc">Najnovšie vydania</option>
                    <option value="year-asc">Najstaršie vydania</option>
                </select>
            </div>
            <button class="button" type="button" data-filter-reset>Vymazať filtre</button>
            <p class="catalog-result-count" data-result-count aria-live="polite"></p>
        </div>
        <div class="song-table-wrapper">
            <table class="song-table" data-song-catalog>
                <caption class="sr-only">Zoznam skladieb</caption>
                <thead>
                <tr>
                    <th scope="col">Názov</th>
                    <th scope="col">Interpret</th>
                    <th scope="col">Album</th>
                    <th scope="col">Žáner</th>
                    <th scope="col">Rok</th>
                    <th scope="col"><span class="sr-only">Akcie</span></th>
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
                        <td><?= e($song->artist) ?></td>
                        <td><?= e($song->getAlbum()?->title ?? '—') ?></td>
                        <td><?= e($song->genre ?? '—') ?></td>
                        <td><?= e($song->release_year ?? '—') ?></td>
                        <td class="table-actions">
                            <a class="button small-button" href="<?= $link->url('home.edit', ['id' => $song->id]) ?>">
                                Upraviť
                            </a>
                            <form method="post" action="<?= $link->url('home.delete', ['id' => $song->id]) ?>">
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
