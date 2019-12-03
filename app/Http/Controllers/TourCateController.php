<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tour_Category;
use App\Tours;
use App\tour_details;

class TourCateController extends Controller
{
    //
    public function getDanhSach()
    {
	    $tourcategory = Tour_Category::all();
	    return view('admin.tour_category.danhsach',['tourcategory'=>$tourcategory]);
	}	

	public function getThem()
    {  
	    return view('admin.tour_category.them');
	}

	public function postThem(Request $request)
	{
		$this->validate($request,
			[
				'name' => 'required|unique:tour_category,name|max:100'
			],
			[
				'name.required'=>'Bạn chưa nhập tên loại tour',
				'name.unique'=>'Tên đã tồn tại',
				'name.max'=>'Tên loại tour có độ dài tối đa là 100 ký tự'
			]);
		$tourcategory = new Tour_Category;
		$tourcategory->name = $request->name;
		$tourcategory->save();
		return redirect('admin/tourcategory/add')->with('thongbao','Thêm thành công');
	}

	public function getSua($id)
    {
	    $tourcategory = Tour_Category::whereid($id)->first();
	    return view('admin.tour_category.sua',compact('tourcategory'));
	}

	public function postSua(Request $request, $id)
	{
		$tourcategory = Tour_Category::whereid($id)->first();
		$this->validate($request,
			[
				'name' => 'required|unique:tour_category,name,'. $id .',id|max:100'
			],
			[
				'name.required'=>'Bạn chưa nhập tên loại tour',
				'name.unique'=>'Tên đã tồn tại',
				'name.max'=>'Tên loại tour có độ dài tối đa là 100 ký tự'
			]);
		$tourcategory->name = $request->name;
		//print_r($tourcategory);
	    //exit;
		$tourcategory->save();
		return redirect('admin/tourcategory/edit/'.$id)->with('thongbao','Sửa thành công');
	}

	public function getXoa($id)
	{
		$tour = Tours::all();
        foreach ($tour as $t) {
            if($t != null && $t->tourcate_id == $id)
                $t->delete();
        }

		$tourcategory = Tour_Category::whereid($id)->first();
		$tourcategory->delete();

		return redirect('admin/tourcategory/list')->with('thongbao','Xoá thành công');
	}
}
