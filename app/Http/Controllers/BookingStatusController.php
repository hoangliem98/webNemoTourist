<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking_Status;

class BookingStatusController extends Controller
{
    //
    public function getDanhSach()
    {
	    $bookingstatus = Booking_Status::all();
	    return view('admin.booking_status.danhsach',['bookingstatus'=>$bookingstatus]);
	}
}
