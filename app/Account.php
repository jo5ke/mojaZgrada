<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function building()
    {
    	return $this->belongsTo('App\Building');
    }
}
