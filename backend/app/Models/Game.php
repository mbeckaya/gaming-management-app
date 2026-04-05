<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'platform_id',
        'genre_id',
        'publisher_id',
        'is_physical',
        'is_digital',
        'release',
    ];
}
