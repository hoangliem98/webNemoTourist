<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour_Category;
use App\Tours;
use App\tour_details;
use App\Tour_Comments;

class TourDetailController extends Controller
{
    //
    public function getDanhSach()
    {
        $tourdetail = tour_details::all();
        return view('admin.tour_details.danhsach',['tourdetail'=>$tourdetail]);
    }   

    public function getThem()
    {  
        $tours = Tours::all();
        return view('admin.tour_details.them',['tours'=>$tours]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'tour' => 'required',
                'content' => 'required'
            ],
            [
                'tour_category.required'=>'Bạn chưa chọn loại tour',
                'tour.required'=>'Bạn chưa chọn tour',
                'content.required'=>'Bạn chưa nhập nội dung'
            ]);
        
        $tourdetail = new tour_details;
        $tourdetail->tour_id = $request->tour;
        $tourdetail->about = $request->about;
        $tourdetail->content = $request->content;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/tourdetail/edit/'.$id)->with('loi','Bạn chỉ được chọn file hình ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = rand(1,999)."_".$name;
            while (file_exists(public_path('upload/images'.$image))) 
            {
                $image = rand(1,999)."_".$name;
            } 
            $destinationPath = public_path('upload/images');
            $file->move($destinationPath, $image);
            $tourdetail->image = $image;
        }
        else
        {
            $tourdetail->image = "tour-default.jpg";
        }
        /*echo ($tourdetail);*/
        $tourdetail->save();
        return redirect('admin/tourdetail/add')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $tours = Tours::all();
        $tourdetail = tour_details::whereid($id)->get();
        return view('admin.tour_details.sua',['tours'=>$tours, 'tourdetail'=>$tourdetail]);
    }

    public function postSua(Request $request, $id)
    {
        $tourdetail = tour_details::whereid($id)->first();
        $tourdetail->tour_id = $request->tour;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/tourdetail/edit/'.$id)->with('loi','Bạn chỉ được chọn file hình ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = rand(1,999)."_".$name;
            while (file_exists(public_path('upload/images/'.$image))) 
            {
                $image = rand(1,999)."_".$name;
            } 
            $destinationPath = public_path('upload/images');
            $file->move($destinationPath, $image);
            $tourdetail->image = $image;
        }
        $tourdetail->about = $request->about;
        $tourdetail->content = $request->content;
        $tourdetail->save();
        return redirect('admin/tourdetail/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $tour_comment = Tour_Comments::wheretourdetail_id($id)->first();
        if($tour_comment != null)
            $tour_comment->delete();
        $tourdetail = tour_details::whereid($id)->first();
        $tourdetail->delete();

        return redirect('admin/tourdetail/list')->with('thongbao','Xoá thành công');
    }
}
