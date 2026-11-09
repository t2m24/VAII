<?php

namespace App\Models;

use Framework\Core\Model;

class Album extends Model
{
    protected static ?string $tableName = 'albums';

    protected static ?array $fillable = [
        'title',
        'artist',
        'release_year',
    ];

    public ?int $id = null;
    public string $title = '';
    public string $artist = '';
    public ?int $release_year = null;
    public ?string $created_at = null;

    /**
     * @return Song[]
     */
    public function getSongs(): array
    {
        return $this->getAllRelated(Song::class, 'album_id');
    }
}
