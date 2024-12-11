<?php

namespace App\Models;

// use App\Traits\CustomUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usercrm extends Authenticatable
{
    protected $connection = 'mysql2';
    protected $table = 'users';
    use Notifiable;
    // use CustomUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    // public function role() {
    //     return $this->belongsTo('App\Models\Role', 'role_id');
    // }
}
