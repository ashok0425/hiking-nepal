<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'content',
        'published_at',
        'thumbnail',
        'cover',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getThumbnailAttribute($value)
    {
        if (! $value) {
            return null;
        }

        if (str_starts_with($value, 'http')) {
            return $value;
        }

        return Storage::disk('public')->url($value);
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

    public static function getRecentPosts()
    {
        return cache()->remember('recent_posts', 3600, function () {
            return self::where('status', 'published')
                ->orderBy('published_at', 'desc')
                ->take(6)
                ->get();
        });
    }

    public function categories()
    {
        return $this->belongsToMany(PostCategory::class);
    }
}
