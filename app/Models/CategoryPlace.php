<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPlace extends Model
{
    protected $table = "categories_places";
    protected $fillable = [
    	'name', 'details', 'status', 'category_destination_id'
    ];

    public function category_destination() {
    	return $this->belongsTo('App\Models\CategoryDestination', 'category_destination_id');
    }

    // public function images() {
    // 	return $this->hasMany('App\Models\CategoryPlaceImage', 'category_place_id');
    // }

    public function packages() {
        return $this->hasMany('App\Models\Package', 'category_place_id');
    }
    public function newimages() {
        return $this->belongsToMany('App\Models\ImageUpload', 'destination_image', 'category_place_id', 'image_id')->withPivot('id');
    }
    public function thumb_image() {
        if($this->newimages->count()) {
            return $this->newimages->first()->thumb_image();
        }

        return "http://placehold.it/370X210";
    }

    public function cover_image() {
        if($this->newimages->count()) {
            return $this->newimages->first()->cover_image();
        }

        return "http://placehold.it/1340x350";
    }
}
