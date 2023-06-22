<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $fillable = [
        'user',
        'title',
        'slug',
        'marks',
        'picture',
        'short_content',
        'content',
        'added',
        'updated',
        'comment',
        'pending',
        'public',
        'active',
    ];
}
