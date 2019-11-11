<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tours;
use App\Tour_Category;
use App\tour_details;
use App\Tour_Bookings;
use Validator;
use DB;

class TourController extends Controller
{
    //

    public function getDanhSach()
    {
        
        $tours = Tours::all();
        $tourcategory = Tour_Category::all();
        return view('admin.tours.danhsach',compact('tours','tourcategory'));
    }

    public function index(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->date_from) && !empty($request->date_to)){
                return datatables()->of(Tours::latest()
                    ->where([['from_date','>=',$request->date_from],['to_date','<=',$request->date_to]])
                    ->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                        return $button;
                    })  
                    ->rawColumns(['action'])
                    ->make(true);
            }
            elseif($request->category){
                return datatables()->of(Tours::latest()
                    ->where('tourcate_id',$request->category)
                    ->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                        return $button;
                    })  
                    ->rawColumns(['action'])
                    ->make(true);
            }
            else
            {
                return datatables()->of(Tours::latest()->get())
                        ->addColumn('action', function($data){
                            $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                            return $button;
                        })  
                        ->rawColumns(['action'])
                        ->make(true);
            }
        }
        $tours = Tours::all();
        $tourcategory = Tour_Category::all();
        return view('admin.tours.danhsach',compact('tours','tourcategory'));
    }


    public function getThem()
    {
        $tourcategory = Tour_Category::all();
        return view('admin.tours.them',['tourcategory'=>$tourcategory]);
        
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:tours,name|max:300',
                'go_from' => 'required|max:100',
                'go_to' => 'required|max:100',
                'about' => 'required',
                'tour_category' => 'required',
                'price' => 'required|numeric',
                'discount' => 'required|numeric',
                'da'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên tour',
                'name.unique'=>'Tên đã tồn tại',
                'name.max'=>'Tên tour có độ dài tối đa là 100 ký tự',
                'go_from.required'=>'Bạn chưa nhập nơi đi',
                'go_from.max'=>'Nơi đi có độ dài tối đa là 100 ký tự',
                'go_to.required'=>'Bạn chưa nhập nơi đến',
                'go_to.max'=>'Nơi đến có độ dài tối đa là 100 ký tự',
                'about.required'=>'Bạn chưa nhập mô tả',
                'tour_category.required'=>'Bạn chưa chọn loại tour',
                'price.required'=>'Bạn chưa nhập giá tiền',
                'price.numeric'=>'Bạn chỉ được nhập số',
                'discount.required'=>'Bạn chưa nhập giảm giá',
                'discount.numeric'=>'Bạn chỉ được nhập số'
            ]);
        $tours = new Tours;
        $tours->name = $request->name;
        $tours->go_from = $request->go_from;
        $tours->go_to = $request->go_to;
        $tours->about = $request->about;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/tour/edit/'.$id)->with('loi','Bạn chỉ được chọn file hình ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = rand(1,999)."_".$name;
            while (file_exists(public_path('upload/images'.$image))) 
            {
                $image = rand(1,999)."_".$name;
            } 
            $destinationPath = public_path('upload/images');
            $file->move($destinationPath, $image);
            $tours->image = $image;
        }
        else
        {
            $tours->image = "tour-default.jpg";
        }
        $tours->tourcate_id = $request->tour_category;
        $tours->price = $request->price;
        $tours->discount = $request->discount;
        $tours->from_date = $request->from_date;
        $tours->to_date = $request->to_date;
        $tours->highlight = $request->highlight;
        /*echo $tours;*/
        $tours->save();
        return redirect('admin/tour/add')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $tourcategory = Tour_Category::all();
        $tours = Tours::whereid($id)->get();
        return view('admin.tours.sua',['tours'=>$tours, 'tourcategory'=>$tourcategory]);
    }

    public function postSua(Request $request, $id)
    {
        $tours = Tours::whereid($id)->first();
        $this->validate($request,
            [
                'name' => 'required|unique:tours,name,'. $id .',id|max:300',
                'go_from' => 'required|max:100',
                'go_to' => 'required|max:100',
                'about' => 'required',
                'tour_category' => 'required',
                'price' => 'required|numeric',
                'discount' => 'required|numeric'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên tour',
                'name.unique'=>'Tên đã tồn tại',
                'name.max'=>'Tên tour có độ dài tối đa là 100 ký tự',
                'go_from.required'=>'Bạn chưa nhập nơi đi',
                'go_from.max'=>'Nơi đi có độ dài tối đa là 100 ký tự',
                'go_to.required'=>'Bạn chưa nhập nơi đến',
                'go_to.max'=>'Nơi đến có độ dài tối đa là 100 ký tự',
                'about.required'=>'Bạn chưa nhập mô tả',
                'tour_category.required'=>'Bạn chưa chọn loại tour',
                'price.required'=>'Bạn chưa nhập giá tiền',
                'price.numeric'=>'Bạn chỉ được nhập số',
                'discount.required'=>'Bạn chưa nhập giảm giá',
                'discount.numeric'=>'Bạn chỉ được nhập số'
            ]);
        $tours->name = $request->name;
        $tours->go_from = $request->go_from;
        $tours->go_to = $request->go_to;
        $tours->about = $request->about;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/tour/edit/'.$id)->with('loi','Bạn chỉ được chọn file hình ảnh có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = rand(1,999)."_".$name;
            while (file_exists(public_path('upload/images/'.$image))) 
            {
                $image = rand(1,999)."_".$name;
            } 
            $destinationPath = public_path('upload/images');
            $file->move($destinationPath, $image);
            $tours->image = $image;
        }
        $tours->tourcate_id = $request->tour_category;
        $tours->price = $request->price;
        $tours->discount = $request->discount;
        $tours->highlight = $request->highlight;
        $tours->save();
        return redirect('admin/tour/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $tourbooking = Tour_Bookings::wheretour_id($id)->first();
        if($tourbooking != null)
            $tourbooking->delete();
        $tourdetail = tour_details::wheretour_id($id)->first();
        if($tourdetail != null)
            $tourdetail->delete();
        $tours = Tours::whereid($id)->first();
        $tours->delete();

        return redirect('admin/tour/list')->with('thongbao','Xoá thành công');
    }


    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|unique:tours,name|max:300',
            'go_from' => 'required|max:100',
            'go_to' => 'required|max:100',
            'tour_category' => 'required',
            'about' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'to_date' => 'required',
            'from_date' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('upload/images'), $new_name);

        // $form_data = array(
        //     'name'          =>  $request->name,
        //     'go_from'       =>  $request->go_from,
        //     'go_to'         =>  $request->go_to,
        //     'about'         =>  $request->about,
        //     'image'         =>  $new_name,
        //     'highlight'     =>  $request->highlight,
        //     'tourcate_id'   =>  $request->tour_category,
        //     'price'         =>  $request->price,
        //     'discount'      =>  $request->discount,
        //     'from_date'     =>  $request->from_date,
        //     'to_date'       =>  $request->to_date
        // );

        $tour = new Tours;
        $tour->name          =  $request->name;
        $tour->go_from       =  $request->go_from;
        $tour->go_to         = $request->go_to;
        $tour->about         =  $request->about;
        $tour->image        =  $new_name;
        $tour->highlight     = $request->highlight;
        $tour->tourcate_id   =  $request->tour_category;
        $tour->price        =  $request->price;
        $tour->discount      =  $request->discount;
        $tour->from_date     =  $request->from_date;
        $tour->to_date       = $request->to_date;
        $tour->save();

        return response()->json(['success' => 'Thêm thành công.']);
    }

     public function edit($id)
    {
        //
        if(request()->ajax())
        {
            $data = Tours::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
        //
       $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
            'name' => 'required|max:300',
            'go_from' => 'required|max:100',
            'go_to' => 'required|max:100',
            'tour_category' => 'required',
            'about' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'image'         =>  'image|max:2048',
            'to_date' => 'required',
            'from_date' => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/images'), $image_name);
        }
        else
        {
            $rules = array(
            'name' => 'required|max:300',
            'go_from' => 'required|max:100',
            'go_to' => 'required|max:100',
            'tour_category' => 'required',
            'about' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'to_date' => 'required',
            'from_date' => 'required'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'name'          =>  $request->name,
            'go_from'       =>  $request->go_from,
            'go_to'         =>  $request->go_to,
            'about'         =>  $request->about,
            'image'         =>   $image_name,
            'highlight'     =>  $request->highlight,
            'tourcate_id'   =>  $request->tour_category,
            'price'         =>  $request->price,
            'discount'      =>  $request->discount,
            'from_date'     =>  $request->from_date,
            'to_date'       =>  $request->to_date
        );
        Tours::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Sửa thành công']);
    }

    public function destroy($id)
    {
        $tourbooking = Tour_Bookings::all();
        foreach ($tourbooking as $tb) {
            if($tb != null && $tb->tour_id == $id)
                $tb->delete();
        }
        $tourdetail = tour_details::all();
        foreach ($tourdetail as $td) {
            if($td != null && $td->tour_id == $id)
                $td->delete();
        }
        $tours = Tours::whereid($id)->first();
        $tours->delete();
    }
}
