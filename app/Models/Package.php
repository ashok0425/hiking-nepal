<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Package extends Model
{
    use HasSlug;

    protected $fillable = [
        'title',
        'status',
        'fitness_level',
        'max_elevation',
        'commute',
        'best_time',
        'group_size',
        'arrival_at',
        'departure_from',
        'meal',
        'tour_duration',
        'stay',
        'price',
        'sale_price_per_person',
        'sale_price_two_plus_per_person',
        'sale_price_eight_plus_per_person',
        'destination_id',
        'place_id',
        'overview',
        'itinerary',
        'faqs',
        'departures',
        'gallery',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'departures' => 'array',
        'gallery' => 'array',
        'price' => 'decimal:2',
        'sale_price_per_person' => 'decimal:2',
        'sale_price_two_plus_per_person' => 'decimal:2',
        'sale_price_eight_plus_per_person' => 'decimal:2',
        'average_rating' => 'decimal:2',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function categories()
    {
        return $this->belongsToMany(PackageCategory::class, 'package_package_category');
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_package');
    }

    public function galleryImages(): array
    {
        /** @var array $images */
        $images = $this->gallery;

        return array_map(function ($image) {
            if (str_starts_with($image, 'http')) {
                return str_replace('new.', '', $image);
            }

            return Storage::disk('public')->url($image);
        }, $images);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function departures()
    {
        return $this->hasMany(Departure::class);
    }
}
