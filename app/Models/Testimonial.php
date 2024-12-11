<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
	protected $table = "testimonials";
	protected $fillable = [
		'name','content', 'status','rating','title','image','email','date','img1','img2','img3','img4'
	];

	
	public function packages() {
		return $this->belongsToMany('App\Models\Package', 'package_testimonial', 'testimonial_id', 'package_id');
    }
}
