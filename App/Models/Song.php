<?php

namespace App\Models;

use Framework\Core\Model;

class Song extends Model
{
    protected static ?string $tableName = 'songs';

    protected static ?array $fillable = [
        'title',
        'artist',
        'album',
        'genre',
        'release_year',
    ];

    public ?int $id = null;
    public string $title = '';
    public string $artist = '';
    public ?string $album = null;
    public ?string $genre = null;
    public ?int $release_year = null;
    public ?string $created_at = null;
}
