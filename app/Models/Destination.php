<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
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

    public function getCoverAttribute($value)
    {
        if (! $value) {
            return null;
        }

        if (str_starts_with($value, 'http')) {
            return $value;
        }

        return Storage::disk('public')->url($value);
    }

    public function scopeActiveAndOrdered($query)
    {
        return $query->where('status', 'active')->orderBy('order');
    }

    public static function getList()
    {
        if (app()->environment('local')) {
            return cache()->remember('destinations', 300, function () {
                return self::activeAndOrdered()->get();
            });
        }

        return self::activeAndOrdered()->get();
    }
}
