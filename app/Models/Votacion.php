<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Votacion extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'votacion';
    protected $fillable = [

        'partido',


    ];

    public $timestamps = false;
}
