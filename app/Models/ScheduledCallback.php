<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledCallback extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'first_name',
        'last_name',
        'email',
        'comments',
        'callback_date',
        'callback_time',
        'callback_message'
    ];
}
