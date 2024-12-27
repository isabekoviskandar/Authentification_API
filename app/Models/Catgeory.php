<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catgeory extends Model
{
    /** @use HasFactory<\Database\Factories\CatgeoryFactory> */
    use HasFactory;

    protected $fillable = 
    [
        'name',
    ];
}
