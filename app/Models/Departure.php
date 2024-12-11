<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
	protected $fillable=['start_date','availability','price','status','package_id'];
	
    public function package() {
		return $this->belongsTo('App\Models\Package', 'package_id');
	}

}
