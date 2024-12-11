<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
	protected $table = "destinations";
	protected $fillable = [
		'name', 'image', 'details', 'status','order'
	];

	public function newimages() {
		return $this->belongsToMany('App\Models\ImageUpload', 'destination_image', 'destination_id', 'image_id')->withPivot('id');
    }

	// public function images() {
	// 	return $this->hasMany('App\Models\DestinationImage', 'destination_id');
	// }

	public function categories_destinations() {
		return $this->hasMany('App\Models\CategoryDestination', 'destination_id');
	}
	
	public function packages() {
		return $this->hasMany('App\Models\Package', 'destination_id');
	}



	
}
