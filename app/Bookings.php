<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    //
    protected $table = "Bookings";

    public function booking_status()
    {
    	return $this->belongsTo('App\Booking_Status','status_id','id');
    }

    public function customers()
    {
    	return $this->belongsTo('App\Customers','customer_id','id');
    }

    public function tour_bookings()
    {
    	return $this->hasMany('App\Tour_Bookings','booking_id','booking_id');
    }

   	public function hotel_bookings()
    {
    	return $this->hasMany('App\Hotel_Bookings','booking_id','booking_id');
    }

    public function transport_bookings()
    {
        return $this->hasMany('App\Transport_Bookings','booking_id','booking_id');
    }

    public function payments()
    {
    	return $this->hasMany('App\Payments','booking_id','id');
    }
}
