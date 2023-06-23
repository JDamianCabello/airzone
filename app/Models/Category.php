<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'visible'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post', 'category', 'blog');
    }
}
