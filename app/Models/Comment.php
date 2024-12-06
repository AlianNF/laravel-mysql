<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    public $timestamps = false; 

    protected $fillable = [
        'author',
        'content',
        'gameId',
        'password',
    ];
}
