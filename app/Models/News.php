<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static get()
 */
class News extends Model
{
    use HasFactory;

//    protected $guarded = [];

    protected $fillable = [
        'title',
        'description',
        'content',
        'author',
        'publisher_id',
    ];
}
