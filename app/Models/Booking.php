<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable=['name','package','date','no_traveller','source','agent','name','comment','email','phone','type','country','expected_date','actual_country','actual_place','longitude','latitude'];
    // protected $fillable=['title','f_name','l_name','mailing_address','email','country','occupation','phone_day','phone_evening','passport_no','passport_place_issue','expiry_date','emergency_contact','booking','departure_date','no_traveller','insurance'];
    public function customers() {
		return $this->hasMany('App\Models\Customer', 'booking_id');
	}
	public function package1() {
		return $this->belongsTo('App\Models\Package', 'package');
	}
}
