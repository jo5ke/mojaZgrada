<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'first_name', 
        'last_name',
        'email', 
        'password',
        'street',
        'apartment_number',
        'building_number',
        'number_of_occupants',
        'phone',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function building()
    {
        return $this->belongsTo('App\Building');
    }

    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }
}
