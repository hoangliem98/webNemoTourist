<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $table = "Customers";

    public function tour_bookings()
    {
    	return $this->hasMany('App\Tour_Bookings','customer_id','id');
    }

   	public function hotel_bookings()
    {
    	return $this->hasMany('App\Hotel_Bookings','customer_id','id');
    }

    public function transport_bookings()
    {
        return $this->hasMany('App\Transport_Bookings','customer_id','id');
    }
}
