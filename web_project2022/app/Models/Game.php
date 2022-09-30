<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_desc',
        'long_desc',
        'game_path'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    
}
