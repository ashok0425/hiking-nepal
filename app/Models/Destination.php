<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Destination extends Model
{
    use HasSlug;

    protected $fillable = [
        'name',
        'tagline',
        'status',
        'slug',
        'cover',
        'desc',
        'order',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
