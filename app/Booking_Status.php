<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_Status extends Model
{
    //
    protected $table = "Booking_Status";

    public function tour_bookings()
    {
    	return $this->hasMany('App\Tour_Bookings','status_id','id');
    }

   	public function hotel_bookings()
    {
    	return $this->hasMany('App\Hotel_Bookings','status_id','id');
    }

    public function transport_bookings()
    {
        return $this->hasMany('App\Transport_Bookings','status_id','id');
    }
}
