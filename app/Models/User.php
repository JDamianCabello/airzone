<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    use HasFactory;

    protected $fillable = [
        'username',
        'full_name',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user');
    }
}
