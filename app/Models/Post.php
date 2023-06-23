<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post', 'blog', 'category');
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'comment_post', 'blog', 'comment');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function writers()
    {
        return $this->belongsToMany(User::class, 'comment_post', 'blog', 'comment');
    }
}
