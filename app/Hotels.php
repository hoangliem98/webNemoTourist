<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    //
    protected $table = "Hotels";

    public function hotel_bookings()
    {
        return $this->hasMany('App\Hotel_Bookings','hotel_id','hotel_id');
    }

    //public function comments()
    //{
    	//return $this->hasMany('App\Comments','hotel_id','comment_id');
    //}
}
