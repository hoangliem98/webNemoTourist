<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;

class CustomerController extends Controller
{
    //
    public function getDanhSach()
    {
	    $customer = Customers::all();
	    return view('admin.customers.danhsach',['customer'=>$customer]);
	}

	public function getThem()
    {
    	return view('admin.customers.them');	
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'first_name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'Address' => 'required|max:500',
                'Phone_number' => 'required|numeric'
            ],
            [
                'first_name.required'=>'Bạn chưa nhập first name',
                'first_name.max'=>'First Name có độ dài tối đa là 100 ký tự',
                'last_name.required'=>'Bạn chưa nhập last name',
                'last_name.max'=>'Last Name có độ dài tối đa là 100 ký tự',
             	'address.required'=>'Bạn chưa nhập địa chỉ',
                'address.max'=>'Địa chỉ có độ dài tối đa là 500 ký tự',
                'phone_number.required'=>'Bạn chưa nhập số điện thoại',
                'phone_number.numeric'=>'Số điện thoại phả nhập số'
            ]);
        
        $customer = new Customers;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->save();
        return redirect('admin/customer/add')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $customer = Customers::whereid($id)->get();
        return view('admin.customers.sua',['customer'=>$customer]);
    }

    public function postSua(Request $request, $id)
    {
        $customer = Customers::whereid($id)->first();
        $this->validate($request,
            [
                'first_name' => 'required|max:100',
                'last_name' => 'required|max:100',
                'Address' => 'required|max:500',
                'Phone_number' => 'required|numeric'
            ],
            [
                'first_name.required'=>'Bạn chưa nhập first name',
                'first_name.max'=>'First Name có độ dài tối đa là 100 ký tự',
                'last_name.required'=>'Bạn chưa nhập last name',
                'last_name.max'=>'Last Name có độ dài tối đa là 100 ký tự',
             	'address.required'=>'Bạn chưa nhập địa chỉ',
                'address.max'=>'Địa chỉ có độ dài tối đa là 500 ký tự',
                'phone_number.required'=>'Bạn chưa nhập số điện thoại',
                'phone_number.numeric'=>'Số điện thoại phả nhập số'
            ]);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->save();
        return redirect('admin/customer/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $hotelbooking = Hotel_Bookings::all();
        foreach ($hotelbooking as $hb) {
            if($hb != null && $hb->customer_id == $id)
                $hb->delete();
        }
        $transportbooking = Transport_Bookings::all();
        foreach ($transportbooking as $tb) {
            if($tb != null && $tb->customer_id == $id)
                $tb->delete();
        }
        $tourbooking = Tour_Bookings::all();
        foreach ($tourbooking as $trb) {
            if($trb != null && $trb->customer_id == $id)
                $trb->delete();
        }        
        $customer = Customers::whereid($id)->first();
        $customer->delete();

        return redirect('admin/customer/list')->with('thongbao','Xoá thành công');
    }
}
