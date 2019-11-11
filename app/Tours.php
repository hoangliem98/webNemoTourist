<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tours extends Model
{
    //
    protected $table = "Tours";

    public function tour_bookings()
    {
    	return $this->hasMany('App\Tour_Bookings','tour_id','id');
    }

    public function tour_details()
    {
        return $this->hasMany('App\tour_details','tour_id','id');
    }

    public function tour_category()
    {
    	return $this->belongsTo('App\Tour_Category','tourcate_id','id');
    }   
}
