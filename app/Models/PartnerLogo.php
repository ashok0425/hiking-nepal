<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PartnerLogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getLogoUrlAttribute()
    {
        if (!$this->logo) {
            return null;
        }

        if (str_starts_with($this->logo, 'http')) {
            return $this->logo;
        }

        return asset('storage/' . $this->logo);
    }
}
