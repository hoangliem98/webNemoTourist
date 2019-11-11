<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transports extends Model
{
    //
    protected $table = "Transports";

    public function transport_bookings()
    {
        return $this->hasMany('App\Transport_Bookings','transport_id','transport_id');
    }
    //public function comments()
    //{
    	//return $this->hasMany('App\Comments','transport_id','comment_id');
    //}
}
