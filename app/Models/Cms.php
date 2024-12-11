<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
	protected $table = "cms";
	protected $fillable = [
		'title', 'parent_id', 'content', 'url', 'status', 'main_or_sub', 'position', 'default','image'
	];
	

	public function parent() {
		return $this->belongsTo('App\Models\Cms', 'parent_id');
	}

	public function child() {
		return $this->hasMany('App\Models\Cms', 'parent_id');
	}


}
