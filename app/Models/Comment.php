<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user',
        'datetime',
        'content'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'id');
    }

    public function writer()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
