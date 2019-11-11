<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour_Comments extends Model
{
    //
    protected $table = "Tour_Comments";
    public function tour_details()
    {
    	return $this->belongsTo('App\tour_details','tourdetail_id','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }
}
