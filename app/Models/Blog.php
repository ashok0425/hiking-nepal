<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'post_title',
        'url',
        'guid',
        'cover_image',
        'post_content',
        'post_date',
        'post_status',
        'meta_title',
        'meta_description',
        'keyword',
    ];
}
