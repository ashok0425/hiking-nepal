<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'user_name',
        'user_photo',
        'rating',
        'comment',
        'package_id',
    ];

    /**
     * Get the package that the review belongs to.
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function getUserPhotoAttribute($value)
    {
        if (!$value) {
            return null;
        }

        if (str_starts_with($value, 'http')) {
            return $value;
        }

        return Storage::disk('public')->url($value);
    }
}
