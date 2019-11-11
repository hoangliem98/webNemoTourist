<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotels;
use App\Hotel_Bookings;

class HotelController extends Controller
{
    //

    public function getDanhSach()
    {
        $hotel = Hotels::all();
        return view('admin.hotels.danhsach',['hotel'=>$hotel]);
    }

    public function getThem()
    {
        return view('admin.hotels.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:hotels,name|max:300',
                'address' => 'required|max:300',
                'contact' => 'required|max:20',
                'about' => 'required',
                'content' => 'required',
                'star_rating' => 'required|numeric',
                'price' => 'required|numeric'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên khách sạn',
                'name.unique'=>'Tên đã tồn tại',
                'name.max'=>'Tên khách sạn có độ dài tối đa là 300 ký tự',
                'address.required'=>'Bạn chưa địa chỉ',
                'address.max'=>'Địa chỉ có độ dài tối đa là 300 ký tự',
                'contact.required'=>'Bạn chưa nhập số điện thoại',
                'contact.max'=>'Liên hệ có độ dài tối đa là 20 ký tự',
                'about.required'=>'Bạn chưa nhập mô tả',
                'content.required'=>'Bạn chưa chọn nội dung',
                'price.required'=>'Bạn chưa nhập giá tiền',
                'price.numeric'=>'Bạn chỉ được nhập số',
                'star_rating.required'=>'Bạn chưa nhập đánh giá',
                'star_rating.numeric'=>'Bạn chỉ được nhập số'
            ]);
        $hotel = new Hotels;
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->contact = $request->contact;
        $hotel->about = $request->about;
        $hotel->highlight = $request->highlight;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/hotel/edit/'.$id)->with('loi','Bạn chỉ được chọn file hình ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = rand(1,999)."_".$name;
            while (file_exists(public_path('upload/images/hotel'.$image))) 
            {
                $image = rand(1,999)."_".$name;
            } 
            $destinationPath = public_path('upload/images/hotel');
            $file->move($destinationPath, $image);
            $hotel->image = $image;
        }
        else
        {
            $hotel->image = "tour-default.jpg";
        }
        $hotel->content = $request->content;
        $hotel->star_rating = $request->star_rating;
        $hotel->price = $request->price;
        $hotel->save();
        return redirect('admin/hotel/add')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $hotel = Hotels::whereid($id)->get();
        return view('admin.hotels.sua',['hotel'=>$hotel]);
    }

    public function postSua(Request $request, $id)
    {
        $hotel = Hotels::whereid($id)->first();
        $this->validate($request,
            [
                'name' => 'required|unique:hotels,name,'. $id .',id|max:300',
                'address' => 'required|max:300',
                'contact' => 'required|max:100',
                'about' => 'required',
                'content' => 'required',
                'star_rating' => 'required|numeric',
                'price' => 'required|numeric'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên khách sạn',
                'name.unique'=>'Tên đã tồn tại',
                'name.max'=>'Tên khách sạn có độ dài tối đa là 300 ký tự',
                'address.required'=>'Bạn chưa địa chỉ',
                'address.max'=>'Địa chỉ có độ dài tối đa là 300 ký tự',
                'contact.required'=>'Bạn chưa nhập số điện thoại',
                'contact.max'=>'Liên hệ có độ dài tối đa là 100 ký tự',
                'about.required'=>'Bạn chưa nhập mô tả',
                'content.required'=>'Bạn chưa chọn nội dung',
                'price.required'=>'Bạn chưa nhập giá tiền',
                'price.numeric'=>'Bạn chỉ được nhập số',
                'star_rating.required'=>'Bạn chưa nhập đánh giá',
                'star_rating.numeric'=>'Bạn chỉ được nhập số'
            ]);
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->contact = $request->contact;
        $hotel->about = $request->about;
        $hotel->highlight = $request->highlight;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/hotel/edit/'.$id)->with('loi','Bạn chỉ được chọn file hình ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = rand(1,999)."_".$name;
            while (file_exists(public_path('upload/images/hotel'.$image))) 
            {
                $image = rand(1,999)."_".$name;
            } 
            $destinationPath = public_path('upload/images/hotel');
            $file->move($destinationPath, $image);
            $hotel->image = $image;
        }
        $hotel->content = $request->content;
        $hotel->star_rating = $request->star_rating;
        $hotel->price = $request->price;
        /*print_r($hotel);
        exit();*/
        $hotel->save();
        
        return redirect('admin/hotel/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {

        $hotelbooking = Hotel_Bookings::all();
        foreach ($hotelbooking as $hb) {
            if($hb != null && $hb->hotel_id == $id)
                $hb->delete();
        }
        $hotel = Hotels::whereid($id)->first();
        $hotel->delete();

        return redirect('admin/hotel/list')->with('thongbao','Xoá thành công');
    }
}
