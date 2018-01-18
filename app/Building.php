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
    	$this->belongsTo('App\Admin');
    }

    public function users()
    {
    	$this->hasMany('App\User');
    }

    public function cleanningplans()
    {
        $this->hasMany('App\CleanningPlan');
    }

    public function invoice()
    {
        $this->hasOne('App\Invoice');
    }

    public function ddds()
    {
        $this->hasMany('App\ddd');
    }
}
