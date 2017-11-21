<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    
    public function admin()
    {
    	$this->belongsTo('App\Admin');
    }

    public function user()
    {
    	$this->hasMany('App\User');
    }
}
