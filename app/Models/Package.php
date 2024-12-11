<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	protected $table = "packages";
	protected $fillable = ['name',
	'overview',
							'outline_itinerary',
							'detailed_itinerary',
							'include_exclude',
							'useful_info',
							'route_map',
							'departure',
							'price',
							'destination_id',
							'category_id',
							'category_destination_id',
							'status',
							'duration',
							'max_altitude',
							'difficulty',
							'min_people_required',

							'deal_package',
							'special_package',
							'order',
							'activity',
							'meals',
							'room',
							'transport',
							'best_month'];


	public function category() {
		return $this->belongsTo('App\Models\Category', 'category_id');
	}

	public function destination() {
		return $this->belongsTo('App\Models\Destination', 'destination_id');
	}

	public function category_destination() {
		return $this->belongsTo('App\Models\CategoryDestination', 'category_destination_id');
	}

	// public function place() {
	// 	return $this->belongsTo('App\Models\Place', 'place_id');
	// }
	public function place() {
		return $this->belongsTo('App\Models\CategoryPlace', 'category_place_id');
	}

	public function newimages() {
        return $this->belongsToMany('App\Models\ImageUpload', 'destination_image', 'package_id', 'image_id')->withPivot('id','alt');
    }
    public function homeimages() {
        return $this->belongsToMany('App\Models\ImageUpload', 'destination_image', 'package_home_id', 'image_id')->withPivot('id','alt');
    }
    public function routemapimages() {
        return $this->belongsToMany('App\Models\ImageUpload', 'destination_image', 'package_routemap_id', 'image_id')->withPivot('id','alt');
    }
	// public function images() {
	// 	return $this->hasMany('App\Models\PackageImage', 'package_id');
	// }
	public function faqs() {
		return $this->hasMany('App\Models\Faq', 'package_id');
	}
	public function itenaries() {
		return $this->hasMany('App\Models\OutlineItinerary', 'package_id');
	}
	public function departure_dates() {
		return $this->hasMany('App\Models\Departure', 'package_id');
	}

	public function testimonials() {
		return $this->belongsToMany('App\Models\Testimonial', 'package_testimonial', 'package_id', 'testimonial_id');
    }

	public function Country($country_id) {
		return $this->belongsToMany('App\Models\Country', 'country_package', 'package_id', 'country_id')->withPivot('overview','faq','outline_itinerary','detailed_itinerary','include_exclude','trip_excludes','useful_info','page_title','meta_keywords','meta_author','meta_description','mobile_meta_keyword','mobile_meta_title','mobile_meta_description','name','currency','price','offer_price')->where('country_id',$country_id)->first();
    }

    public function gallery() {
		return $this->hasMany(PackageImage::class);
    }

}
