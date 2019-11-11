<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel_Bookings;
use App\Hotels;
use App\Customers;

class HotelBookingController extends Controller
{
    //
    public function getDanhSach()
    {
	    $hotelbooking = Hotel_Bookings::all();
	    return view('admin.hotel_bookings.danhsach',compact('hotelbooking'));
	}

	public function getSua($id)
    {
	    $hotelbooking = Hotel_Bookings::whereid($id)->first();
	    $hotel = Hotels::all();
	    $customer = Customers::all();
	    return view('admin.hotel_bookings.sua',compact('hotelbooking','hotel','customer'));
	}

	public function postSua(Request $request, $id)
	{
		$hotelbooking = Hotel_Bookings::whereid($id)->first();
		$this->validate($request,
			[
				'hotel' => 'required',
				'total_price'=>'required|numeric',
				'number_of_room' => 'required|numeric|max:5',
				'time' => 'required|numeric'
			],
			[
				'hotel.required'=>'Bạn chưa chọn khách sạn',
				'booking_start_date.required'=>'Bạn nhập ngày đi',
				'total_price.required'=>'Nhập tổng tiền',
				'total_price.numeric'=>'Tổng tiền phải là số',
				'number_of_room.required'=>'Bạn chưa nhập số lượng phòng',
				'number_of_room.numeric'=>'Số lượng phòng là dạng số',
				'number_of_room.max'=>'Số phòng được đặt tối đa là 5 phòng',
				'time.required'=>'Chưa nhập thời gian thuê',
				'time.numeric'=>'Thời gian thuê là dạng số'
			]);
		$hotel = Hotels::whereid($hotelbooking->hotel_id)->first();
		$customer = Customers::whereid($hotelbooking->customer_id)->first();
		$hotelbooking->hotel_id = $hotel->id;
		$hotelbooking->customer_id = $request->customer;
		$hotelbooking->details = $request->details;
		$hotelbooking->booking_start_date = $request->booking_start_date;
		$hotelbooking->number_of_room = $request->number_of_room;
		$hotelbooking->time = $request->time;
		$hotelbooking->customer_id = $customer->id;
		$hotelbooking->total_price = $hotel->price * $request->time * $request->number_of_room;
		$hotelbooking->save();
		return redirect('admin/hotelbooking/edit/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
	{
		$hotelbooking = Hotel_Bookings::whereid($id)->first();
		$hotelbooking->delete();

		return redirect('admin/hotelbooking/list')->with('thongbao','Xoá thành công');
	}
}
