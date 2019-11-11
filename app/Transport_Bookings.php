<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport_Bookings extends Model
{
    //

    protected $table = "Transport_Bookings";

    public function transports()
    {
    	return $this->belongsTo('App\Transports','transport_id','id');
    }

    public function customers()
    {
        return $this->belongsTo('App\Customers','customer_id','id');
    }
}
