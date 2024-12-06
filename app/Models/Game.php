<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'game';
    public $timestamps = false; 

    protected $fillable = [
        'id',
        'title',
        'description',
        'imageUrl',
        'hours',
        'genres',
        'trailer',
        'metascore',
        'releaseDate',
    ];
}
