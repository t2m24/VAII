<?php

namespace App\Models;

use Framework\Core\Model;

class Song extends Model
{
    protected static ?string $tableName = 'songs';

    protected static ?array $fillable = [
        'title',
        'artist',
        'genre',
        'release_year',
        'album_id',
    ];

    public ?int $id = null;
    public string $title = '';
    public string $artist = '';
    public ?int $album_id = null;
    public ?string $genre = null;
    public ?int $release_year = null;
    public ?string $created_at = null;

    public function getAlbum(): ?Album
    {
        if ($this->album_id === null) {
            return null;
        }

        return $this->getOneRelated(Album::class, 'album_id');
    }
}
