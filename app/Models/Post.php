<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'post';
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'partido',

    ];

    public $timestamps = false;

}
