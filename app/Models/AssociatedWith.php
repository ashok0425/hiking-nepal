<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssociatedWith extends Model
{
	protected $table = "associated_with";
	protected $fillable = [
		'title', 'link', 'status'
	];
}
