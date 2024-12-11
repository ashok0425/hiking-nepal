<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
	protected $fillable = ['question', 'answer', 'package_id'];

   	public function package() {
    	return $this->belongsTo('App\Models\Package', 'package_id');
    }
}
