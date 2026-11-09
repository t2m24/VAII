<?php

/** @var \App\Models\Song $song */
/** @var \App\Models\Album[] $albums */
/** @var string $formAction */
/** @var string $formTitle */
/** @var \Framework\Support\LinkGenerator $link */
?>
<section class="song-form-section" aria-labelledby="form-title">
    <div class="page-heading">
        <div>
            <p class="eyebrow">Hudobná knižnica</p>
            <h1 id="form-title"><?= e($formTitle) ?></h1>
        </div>
    </div>

    <form class="song-form" method="post" action="<?= e($formAction) ?>">
        <div class="form-grid">
            <div class="form-field">
                <label for="title">Názov skladby</label>
                <input id="title" name="title" type="text" value="<?= e($song->title) ?>" required>
            </div>
            <div class="form-field">
                <label for="artist">Interpret</label>
                <input id="artist" name="artist" type="text" value="<?= e($song->artist) ?>" required>
            </div>
            <div class="form-field">
                <label for="album_id">Album</label>
                <select id="album_id" name="album_id">
                    <option value="">Bez albumu</option>
                    <?php foreach ($albums as $album) { ?>
                        <option value="<?= e($album->id) ?>"
                            <?= $song->album_id === $album->id ? 'selected' : '' ?>>
                            <?= e($album->title) ?> — <?= e($album->artist) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-field">
                <label for="genre">Žáner</label>
                <input id="genre" name="genre" type="text" value="<?= e($song->genre ?? '') ?>">
            </div>
            <div class="form-field">
                <label for="release_year">Rok vydania</label>
                <input id="release_year" name="release_year" type="number" min="0" max="2100"
                       value="<?= e($song->release_year ?? '') ?>">
            </div>
        </div>
        <div class="form-actions">
            <button class="primary-button" type="submit">Uložiť skladbu</button>
            <a class="button" href="<?= $link->url('home.index') ?>">Zrušiť</a>
        </div>
    </form>
</section>
