<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transports;
use App\Transport_Bookings;

class TransportController extends Controller
{
    //

    public function getDanhSach()
    {
        $transport = Transports::all();
        return view('admin.transports.danhsach',['transport'=>$transport]);
    }

    public function getThem()
    {
        return view('admin.transports.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:transports,name|max:300',
                'highlight' => 'required',
                'content' => 'required',
                'price' => 'required|numeric'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên khách sạn',
                'name.unique'=>'Tên đã tồn tại',
                'name.max'=>'Tên khách sạn có độ dài tối đa là 300 ký tự',
                'highlight.required'=>'Bạn chưa nhập mô tả',
                'content.required'=>'Bạn chưa chọn nội dung',
                'price.required'=>'Bạn chưa nhập giá tiền',
                'price.numeric'=>'Bạn chỉ được nhập số'
            ]);
        $transport = new Transports;
        $transport->name = $request->name;
        $transport->price = $request->price;
        $transport->highlight = $request->highlight;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/transport/edit/'.$id)->with('loi','Bạn chỉ được chọn file hình ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = rand(1,999)."_".$name;
            while (file_exists(public_path('upload/images/transport'.$image))) 
            {
                $image = rand(1,999)."_".$name;
            } 
            $destinationPath = public_path('upload/images/transport');
            $file->move($destinationPath, $image);
            $transport->image = $image;
        }
        else
        {
            $transport->image = "transport-default.jpg";
        }
        $transport->content = $request->content;
        $transport->save();
        return redirect('admin/transport/add')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $transport = Transports::whereid($id)->get();
        return view('admin.transports.sua',['transport'=>$transport]);
    }

    public function postSua(Request $request, $id)
    {
        $transport = Transports::whereid($id)->first();
        $this->validate($request,
            [
                'name' => 'required|unique:transports,name,'. $id .',id|max:300',
                'highlight' => 'required',
                'content' => 'required',
                'price' => 'required|numeric'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên khách sạn',
                'name.unique'=>'Tên đã tồn tại',
                'name.max'=>'Tên khách sạn có độ dài tối đa là 300 ký tự',
                'highlight.required'=>'Bạn chưa nhập mô tả',
                'content.required'=>'Bạn chưa chọn nội dung',
                'price.required'=>'Bạn chưa nhập giá tiền',
                'price.numeric'=>'Bạn chỉ được nhập số'
            ]);
        $transport->name = $request->name;
        $transport->price = $request->price;
        $transport->highlight = $request->highlight;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/transport/edit/'.$id)->with('loi','Bạn chỉ được chọn file hình ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = rand(1,999)."_".$name;
            while (file_exists(public_path('upload/images/transport'.$image))) 
            {
                $image = rand(1,999)."_".$name;
            } 
            $destinationPath = public_path('upload/images/transport');
            $file->move($destinationPath, $image);
            $transport->image = $image;
        }
        $transport->content = $request->content;
        $transport->save();
        
        return redirect('admin/transport/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $transportbooking = Transport_Bookings::all();
        foreach ($transportbooking as $tb) {
            if($tb != null && $tb->transport_id == $id)
                $tb->delete();
        }
        $transport = Transports::whereid($id)->first();
        $transport->delete();

        return redirect('admin/transport/list')->with('thongbao','Xoá thành công');
    }
}
