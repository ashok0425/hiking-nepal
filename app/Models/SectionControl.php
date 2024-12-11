<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionControl extends Model
{
    protected $table = "frontend_section_control";
    protected $fillable = [
    	'name', 'display_name', 'status', 'details'
    ];

}
