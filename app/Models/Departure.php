<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'start_date',
        'end_date',
        'show_on_home_page',
        'total_seats',
        'booked_seats',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
