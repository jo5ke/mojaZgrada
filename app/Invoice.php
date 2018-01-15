<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //

    public function phone()
    {
        return $this->belongsTo('App\Building');
    }

}
