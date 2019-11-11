<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tours;
use App\Slides;
use App\Tour_Category;
use App\tour_details;
use App\Hotels;
use App\Transports;
use App\User;
use App\Tour_Bookings;
use App\Hotel_Bookings;
use App\Transport_Bookings;
use App\Customers;

class PageController extends Controller
{
    //
    public function gettrangchu()
    {
    	$tourhighlight = Tours::wherehighlight(1)->paginate(4);
        $hotelhighlight = Hotels::wherehighlight(1)->paginate(4);
    	$slide = Slides::all();
    	return view('pages.home',compact('slide', 'tourhighlight' ,'hotelhighlight'));
    }

    public function getloaitour($tourcate_id)
    {
        $tourcategory = Tour_Category::whereid($tourcate_id)->first();
        $tour = Tours::wheretourcate_id($tourcate_id)->paginate(9);
    	return view('pages.tourcategory', compact('tourcategory','tour'));
    }

    public function getchitiettour($tour_id, Request $request)
    {
        $tour = Tours::whereid($tour_id)->first();
        $tourhighlight = Tours::wherehighlight(1)->paginate(3);
        $tourdetail = tour_details::wheretour_id($tour_id)->first();
        list($a, $b) = explode(' - ',substr($tour->name,10));
        $hotelhere = Hotels::where('address','like','%'.$a.'%')->orwhere('address','like','%'.$b.'%')->get();
    	return view('pages.tourdetail', compact('tour', 'tourdetail', 'tourhighlight', 'hotelhere'));    
    }

    public function getkhachsan()
    {
        $hotel = Hotels::first()->paginate(9);
        return view('pages.hotel', compact('hotel'));
    }

    public function getchitietkhachsan(Request $request)
    {
        $hotel = Hotels::whereid($request->id)->first();
        $hotelhighlight = Hotels::wherehighlight(1)->paginate(3);
        return view('pages.hoteldetail', compact('hotel', 'hotelhighlight'));
    }

    public function getgoithuexe()
    {
        $transport = Transports::first()->paginate(9);
        return view('pages.transport', compact('transport'));
    }

    public function getchitietthuexe(Request $request)
    {
        $transport = Transports::whereid($request->id)->first();
        return view('pages.transportdetail', compact('transport'));
    }
    
    public function getlienhe()
    {
    	return view('pages.contact');
    }

    public function getdangnhap()
    {
        return view ('pages.login');
    }

    public function postdangnhap(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|max:255',
                'password' => 'required|max:32'
            ],
            [
                'email.required'=>'Bạn chưa nhập email',
                'email.max'=>'Email có độ dài tối đa là 255 ký tự',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.max'=>'Mật khẩu có độ dài tối đa là 32 ký tự'
            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('home');
        }
        else
        {
            return redirect('login')->with('thongbao','Tài khoản không tồn tại hoặc sai mật khẩu');
        }
    }

    public function getdangky()
    {
        return view ('pages.signup');
    }

    public function postdangky(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|max:100',
                'email' => 'required|email|unique:users,email|max:100',
                'password' => 'required|max:32',
                'passagain' => 'required|same:password'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên người dùng',
                'name.max'=>'Tên người có độ dài tối đa là 100 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.max'=>'Email có độ dài tối đa là 100 ký tự',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.max'=>'Mật khẩu có độ dài tối đa là 32 ký tự',
                'passagain.required'=>'Bạn chưa xác nhận mật khẩu',
                'passagain.same'=>'Mật khẩu chưa khớp'
            ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = 0;
        $user->save();

        return redirect('signup')->with('thongbao','Đăng ký thành công. Hãy tiến hành đăng nhập');
    }

    public function getdangxuat()
    {
        Auth::logout();
        return redirect('home');
    }

    public function getnguoidung()
    {
        $user = Auth::user();
        return view ('pages.user',compact('user'));
    }

    public function postnguoidung(Request $request)
    {
        $user = Auth::user();
        $this->validate($request,
            [
                'name' => 'required|max:100'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên người dùng',
                'name.max'=>'Tên người có độ dài tối đa là 100 ký tự'
            ]);
        $user->name = $request->name;
        if(isset($request->changepass))
        {
            $this->validate($request,
            [
                'password' => 'required|max:32',
                'passagain' => 'required|same:password'
            ],
            [
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.max'=>'Mật khẩu có độ dài tối đa là 32 ký tự',
                'passagain.required'=>'Bạn chưa xác nhận mật khẩu',
                'passagain.same'=>'Mật khẩu chưa khớp'
            ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect('user')->with('thongbao','Sửa thành công');
    }

    public function gettimkiem(Request $request)
    {
        $key = $request->key;
        $tour = Tours::where('name','like','%'.$key.'%')->orwhere('price',$request->price)->orwhere('about','like','%'.$key.'%')->paginate(6);
        return view('pages.searchtour', compact('tour', 'key'));
    }

    public function gettimkiemks(Request $request)
    {
        $key = $request->key;
        $hotel = Hotels::where('name','like','%'.$key.'%')->orwhere('address','like','%'.$key.'%')->orwhere('about','like','%'.$key.'%')->paginate(6);
        return view('pages.hotelsearch', compact('hotel', 'key'));
    }

    public function getbooking($id)
    {
        $tour = Tours::whereid($id)->first();
        list($a, $b) = explode(' - ',substr($tour->name,10));
        $hotelhere = Hotels::where('address','like','%'.$a.'%')->orwhere('address','like','%'.$b.'%')->get();
        return view('pages.booking', compact('tour', 'hotelhere'));
    }

    public function postbooking(Request $request)
    {
        $this->validate($request,
        [
            'phone_number' => 'numeric',
            'email' => 'email',
            'number_of_people' => 'numeric|max:30'
        ],
        [
            'phone_number.numeric' => 'Số điện thoại là dạng số',
            'email.email' => 'Email không hợp lệ',
            'number_of_people.numeric'=>'Vui lòng nhập số người là dạng số',
            'number_of_people.max'=>'Số người tối đa là 30 người'
        ]);

        if($user = Auth::user())
        {$user->score = $user->score + 10;
        $user->save();}

        $tour = Tours::whereid($request->id)->first();
        $customer = new Customers;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->save();

        $tourbooking = new Tour_Bookings;
        $tourbooking->tour_id = $tour->id;
        $tourbooking->number_of_people = $request->number_of_people;
        $tourbooking->details = $request->details;
        $tourbooking->customer_id = $customer->id;
        $tourbooking->date_booking = date('Y-m-d');
        $tourbooking->total_price = $request->total_price;
        $tourbooking->save();
        return redirect('tour-booking/'.$request->id)->with('thongbao','Đặt tour thành công. Chúng tôi sẽ sớm liên hệ lại với bạn');
    }

    public function getbookingks($id)
    {
        $hotel = Hotels::whereid($id)->first();
        return view('pages.hotelbooking', compact('hotel'));
    }

    public function postbookingks(Request $request)
    {
        $this->validate($request,
        [
            'phone_number' => 'numeric',
            'email' => 'email',
            'number_of_room' => 'numeric|max:5',
            'time' => 'numeric'
        ],
        [
            'phone_number.numeric' => 'Số điện thoại là dạng số',
            'email.email' => 'Email không hợp lệ',
            'number_of_room.numeric'=>'Vui lòng nhập số lượng phòng là dạng số',
            'number_of_room.max'=>'Số lượng phòng tối đa được thuê là 5 phòng',
            'time.numeric' => 'Vui lòng nhập thời gian thuê là dạng số'
        ]);

        if($user = Auth::user())
        {$user->score = $user->score + 3;
        $user->save();}

        $hotel = Hotels::whereid($request->id)->first();
        $customer = new Customers;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->save();

        $hotelbooking = new Hotel_Bookings;
        $hotelbooking->hotel_id = $hotel->id;           
        $hotelbooking->booking_start_date = $request->booking_start_date;
        $hotelbooking->time = $request->time;
        $hotelbooking->customer_id = $customer->id;
        $hotelbooking->number_of_room = $request->number_of_room;
        $hotelbooking->total_price = $request->total_price;
        $hotelbooking->details = $request->details;
        $hotelbooking->save();
        return redirect('hotel-booking/'.$request->id)->with('thongbao','Đặt khách sạn thành công. Chúng tôi sẽ sớm liên hệ lại với bạn');
    }

    public function getbookingxe($id)
    {
        $transport = Transports::whereid($id)->first();
        return view('pages.transportbooking', compact('transport'));
    }

    public function postbookingxe(Request $request)
    {
        $this->validate($request,
        [
            'phone_number' => 'numeric',
            'email' => 'email',
            'time' => 'numeric'
        ],
        [
            'phone_number.numeric' => 'Số điện thoại là dạng số',
            'email.email' => 'Email không hợp lệ',
            'time.numeric' => 'Vui lòng nhập thời gian thuê là dạng số'
        ]);

        if($user = Auth::user())
        {$user->score = $user->score + 1;
        $user->save();}

        $transport = Transports::whereid($request->id)->first();
        $customer = new Customers;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->save();

        $transportbooking = new Transport_Bookings;
        $transportbooking->transport_id = $transport->id;           
        $transportbooking->booking_start_date = $request->booking_start_date;
        $transportbooking->time = $request->time;
        $transportbooking->customer_id = $customer->id;
        $transportbooking->total_price = $request->total_price;
        $transportbooking->details = $request->details;
        $transportbooking->save();
        return redirect('transport-booking/'.$request->id)->with('thongbao','Đặt xe thành công. Chúng tôi sẽ sớm liên hệ lại với bạn');
    }
}
