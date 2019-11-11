<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour_Category extends Model
{
    //
    protected $table = "Tour_Category";

    public function tours()
    {
    	return $this->hasMany('App\Tours','tourcate_id','id');
    }

    public function tourdetails()
    {
    	return $this->hasManyThrough('App\tour_details','App\Tours','tourcate_id','tour_id','id');
    }

    //public function tour_bookings()
    //{
        //return $this->hasManyThrough('App\Tour_Bookings','App\Tours','tourcate_id','tour_id','id');
    //}
}
