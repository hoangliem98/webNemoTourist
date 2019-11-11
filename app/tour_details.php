<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tour_details extends Model
{
    //
    protected $table = "tour_details";
    public function tours()
    {
    	return $this->belongsTo('App\Tours','tour_id','id');
    }
    public function tour_comments()
    {
    	return $this->hasMany('App\Tour_Comments','tourdetail_id','id');
    }
}
