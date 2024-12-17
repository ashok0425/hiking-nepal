<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Place extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'cover',
        'status',
        'destination_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
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
}
