<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour_Bookings extends Model
{
    //
    protected $table = "tour_bookings";

    public function tours()
    {
    	return $this->belongsTo('App\Tours','tour_id','id');
    }

    public function customers()
    {
        return $this->belongsTo('App\Customers','customer_id','id');
    }
}
