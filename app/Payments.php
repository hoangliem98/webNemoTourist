<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    //
    protected $table = "Payments";

    public function bookings()
    {
    	return $this->belongsTo('App\Bookings','booking_id','id');
    }
}
