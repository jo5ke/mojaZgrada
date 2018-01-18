<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'address', 
        'address_no',
        'city', 
        'number_of_apartments',
        'invoice',
        'pib',
        'mat',

    ];
    
    public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function cleanningplans()
    {
        return $this->hasMany('App\CleanningPlan');
    }

    public function invoice()
    {
        return $this->hasMany('App\Invoice');//hasOne??? *.*.*.*
    }

    public function ddds()
    {
        return $this->hasMany('App\ddd');
    }
    public function account()
    {
        return $this->hasOne('App\Account');
    }
}
