<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel_Bookings extends Model
{
    //
    protected $table = "Hotel_Bookings";

    public function customers()
    {
        return $this->belongsTo('App\Customers','customer_id','id');
    }

    public function hotels()
    {
        return $this->belongsTo('App\Hotels','hotel_id','id');
    }
}
