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
            if (str_contains($value, 'wp-content')) {
                $parsedUrl = parse_url($value);
                $path = $parsedUrl['path'];
                $url = config('app.url') . $path;
                return preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $url);
            }
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

    public function places()
    {
        return $this->hasMany(Place::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
