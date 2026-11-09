<?php

/** @var \App\Models\Album $album */
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
                <label for="title">Názov albumu</label>
                <input id="title" name="title" type="text" value="<?= e($album->title) ?>" required>
            </div>
            <div class="form-field">
                <label for="artist">Interpret</label>
                <input id="artist" name="artist" type="text" value="<?= e($album->artist) ?>" required>
            </div>
            <div class="form-field">
                <label for="release_year">Rok vydania</label>
                <input id="release_year" name="release_year" type="number" min="0" max="2100"
                       value="<?= e($album->release_year ?? '') ?>">
            </div>
        </div>
        <div class="form-actions">
            <button class="primary-button" type="submit">Uložiť album</button>
            <a class="button" href="<?= $link->url('album.index') ?>">Zrušiť</a>
        </div>
    </form>
</section>
