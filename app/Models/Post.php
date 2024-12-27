<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = 
    [
        'category_id',
        'title',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Catgeory::class);
    }
}
