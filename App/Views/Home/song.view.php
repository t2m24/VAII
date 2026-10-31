<?php

/** @var \Framework\Support\LinkGenerator $link */
?>
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
        <h1 id="song-title">Názov skladby</h1>
        <p class="artist-name">Meno interpreta</p>

        <dl class="song-meta">
            <dt>Album</dt>
            <dd>Nočné sessions</dd>
            <dt>Žáner</dt>
            <dd>Indie / alternatíva</dd>
            <dt>Rok vydania</dt>
            <dd>2024</dd>
        </dl>

        <div class="song-actions">
            <button class="primary-button" type="button">Pridať do playlistu <span aria-hidden="true">⌄</span></button>
            <button type="button">Upraviť / odstrániť</button>
        </div>
    </div>
</section>

<section class="reviews" aria-labelledby="reviews-title">
    <h2 id="reviews-title">Recenzie a hodnotenie</h2>
    <div class="rating-card">
        <span class="rating-label">Priemerné hodnotenie</span>
        <div class="rating-summary">
            <span class="rating-number">4,5 / 5</span>
            <span class="rating-star" aria-hidden="true">★</span>
            <span class="rating-count">(24 hodnotení)</span>
        </div>

        <div class="your-rating">
            <span class="your-rating-label">Vaše hodnotenie</span>
            <div class="star-picker" role="group" aria-label="Vyberte hodnotenie od jednej do piatich hviezdičiek">
                <button type="button" aria-label="1 hviezdička">☆</button>
                <button type="button" aria-label="2 hviezdičky">☆</button>
                <button type="button" aria-label="3 hviezdičky">☆</button>
                <button type="button" aria-label="4 hviezdičky">☆</button>
                <button type="button" aria-label="5 hviezdičiek">☆</button>
            </div>
            <button type="button">Uložiť</button>
        </div>
    </div>
</section>
