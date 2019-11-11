<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour_Bookings;
use App\Tours;
use App\Customers;

class TourBookingController extends Controller
{
    //
    public function getDanhSach()
    {
	    $tourbooking = Tour_Bookings::all();
	    return view('admin.tour_bookings.danhsach',compact('tourbooking'));
	}

	public function getSua($id)
    {
	    $tourbooking = Tour_Bookings::whereid($id)->get();
	    $tour = Tours::all();
	    $customer = Customers::all();
	    return view('admin.tour_bookings.sua',compact('tourbooking','tour','customer'));
	}

	public function postSua(Request $request, $id)
	{
		$tourbooking = Tour_Bookings::whereid($id)->first();
		$this->validate($request,
			[
				'tour' => 'required',
				'customer'=> 'required',
				'date_booking'=>'required|date_format:Y-m-d',
				'total_price'=>'required|numeric',
				'number_of_people' => 'required|numeric|max:30'
			],
			[
				'tour.required'=>'Bạn chưa chọn tour',
				'customer.required'=>'Bạn chưa chọn khách hàng',
				'date_booking.required'=>'Bạn nhập ngày đi',
				'date_booking.date_format'=>'Ngày đi sai định dạng. Định dạng: yyyy-m-d',
				'total_price.required'=>'Nhập tổng tiền',
				'total_price.numeric'=>'Tổng tiền phải là số',
				'number_of_people.required'=>'Bạn chưa nhập số người đi',
				'number_of_people.numeric'=>'Vui lòng nhập số người là dạng số',
				'number_of_people.max'=>'Số người tối đa là 30 người'
			]);
		$customer = Customers::whereid($tourbooking->customer_id)->first();
		$tourbooking->tour_id = $request->tour;
		$tourbooking->customer_id = $customer->id;
		$tourbooking->details = $request->details;
		$tourbooking->date_booking = $request->date_booking;
		$tourbooking->total_price = $request->total_price;
		$tourbooking->number_of_people = $request->number_of_people;
		$tourbooking->save();
		return redirect('admin/tourbooking/edit/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
	{
		$tourbooking = Tour_Bookings::whereid($id)->first();
		$tourbooking->delete();

		return redirect('admin/tourbooking/list')->with('thongbao','Xoá thành công');
	}
}
