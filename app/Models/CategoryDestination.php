<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryDestination extends Model
{
    protected $table = "categories_destinations";
    protected $fillable = [
    	'name', 'destination_id', 'category_id', 'details', 'status'
    ];

    public function destination() {
    	return $this->belongsTo('App\Models\Destination', 'destination_id');
    }

    public function places() {
        return $this->hasMany('App\Models\CategoryPlace', 'category_destination_id');
    }
//not needed category
    public function category() {
        
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function newimages() {
        return $this->belongsToMany('App\Models\ImageUpload', 'destination_image', 'category_destination_id', 'image_id')->withPivot('id');
    }

    // public function images() {
    // 	return $this->hasMany('App\Models\CategoryDestinationImage', 'category_destination_id');
    // }

    public function packages() {
        return $this->hasMany('App\Models\Package', 'category_destination_id');
    }
    // public function places() {
    //     return $this->hasMany('App\Models\CategoryPlace', 'category_destination_id');
    // }

    public function thumb_image() {
        if($this->newimages->count()) {
            return $this->newimages->first()->thumb_image();
        }
        // return getImageurl('dist/frontend/assets/images/popular1.jpg');
        return "http://placehold.it/300x240";
    }

    public function cover_image() {
        if($this->newimages->count()) {
            return $this->newimages->first()->cover_image();
        }

        return "http://placehold.it/1340x350";
    }
    public function home_image() {
        if($this->newimages->count()) {
            return $this->newimages->first()->home_image();
        }

        return "http://placehold.it/1340x350";
    }
}
