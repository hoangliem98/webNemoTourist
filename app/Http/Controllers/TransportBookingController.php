<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transport_Bookings;
use App\Transports;
use App\Customers;

class TransportBookingController extends Controller
{
    //
    public function getDanhSach()
    {
	    $transportbooking = Transport_Bookings::all();
	    return view('admin.transport_bookings.danhsach',compact('transportbooking'));
	}

	public function getSua($id)
    {
	    $transportbooking = Transport_Bookings::whereid($id)->first();
	    $transport = Transports::all();
	    $customer = Customers::all();
	    return view('admin.transport_bookings.sua',compact('transportbooking','transport','customer'));
	}

	public function postSua(Request $request, $id)
	{
		$transportbooking = Transport_Bookings::whereid($id)->first();
		
		$transport = Transports::whereid($transportbooking->transport_id)->first();
		$customer = Customers::whereid($transportbooking->customer_id)->first();
		$transportbooking->transport_id = $transport->id;
		$transportbooking->customer_id = $customer->id;
		$transportbooking->details = $request->details;
		$transportbooking->time = $request->time;
		$transportbooking->booking_start_date = $request->booking_start_date;
		$transportbooking->total_price = $request->total_price;
		$transportbooking->save();
		return redirect('admin/transportbooking/edit/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
	{
		$transportbooking = Transport_Bookings::whereid($id)->first();
		$transportbooking->delete();

		return redirect('admin/transportbooking/list')->with('thongbao','Xoá thành công');
	}
}
