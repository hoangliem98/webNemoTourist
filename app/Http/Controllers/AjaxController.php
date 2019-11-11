<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour_Category;
use App\Tours;
use App\Hotels;
use App\Transports;

class AjaxController extends Controller
{
    //
    public function getTour($tourcate_id)
    {
    	$tour = Tours::where('tourcate_id',$tourcate_id)->get();
    	foreach ($tour as $t) 
    	{
    		echo "<option value='".$t->id."'>".$t->name."<option/>";
    	}
    }

    public function getTientour(Request $request)
    {
        $tourprice = Tours::select('price')->where('id',$request->id)->first();
        return response()->json($tourprice);
    }

    public function getkhachsan(Request $request)
    {
        $hotelprice = Hotels::where('id',$request->id)->first();
        return response()->json($hotelprice);
    }

	public function getTien(Request $request)
    {
    	$hotelprice = Hotels::select('price')->where('id',$request->id)->first();
    	return response()->json($hotelprice);
    }

}
