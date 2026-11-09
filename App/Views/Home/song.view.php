<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Song $song */
?>
<?php $album = $song->getAlbum(); ?>
<section class="song-overview" aria-labelledby="song-title">
    <div>
        <div class="cover-placeholder" role="img" aria-label="Zástupný obrázok obalu albumu">
            <span class="image-icon" aria-hidden="true"></span>
            <p class="cover-caption">Obal albumu / obrázok skladby</p>
        </div>

        <div class="audio-player" aria-label="Ovládanie prehrávania skladby">
            <button class="play-button" type="button" aria-label="Prehrať skladbu">▷</button>
            <div class="progress" aria-hidden="true"></div>
            <span class="duration">01:23 / 03:45</span>
            <span class="volume" aria-hidden="true">⌕</span>
            <span class="volume-level" aria-hidden="true"></span>
        </div>
    </div>

    <div class="song-info">
        <p class="eyebrow">Detail skladby</p>
        <h1 id="song-title"><?= e($song->title) ?></h1>
        <p class="artist-name"><?= e($song->artist) ?></p>

        <dl class="song-meta">
            <dt>Album</dt>
            <dd>
                <?php if ($album !== null) { ?>
                    <a href="<?= $link->url('album.show', ['id' => $album->id]) ?>"><?= e($album->title) ?></a>
                <?php } else { ?>
                    Neuvedený album
                <?php } ?>
            </dd>
            <dt>Žáner</dt>
            <dd><?= e($song->genre ?? 'Neuvedený žáner') ?></dd>
            <dt>Rok vydania</dt>
            <dd><?= e($song->release_year ?? 'Neuvedený') ?></dd>
        </dl>

        <div class="song-actions">
            <a class="button primary-button" href="<?= $link->url('home.edit', ['id' => $song->id]) ?>">Upraviť skladbu</a>
            <a class="button" href="<?= $link->url('home.index') ?>">Späť na katalóg</a>
        </div>
    </div>
</section>

<section class="reviews" aria-labelledby="reviews-title">
    <h2 id="reviews-title">Recenzie a hodnotenie</h2>
    <div class="rating-card">
        <span class="rating-label">Hodnotenie</span>
        <p class="detail-note">Hodnotenia budú dostupné v ďalšej etape aplikácie.</p>
    </div>
</section>
