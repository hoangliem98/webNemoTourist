<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Tour_Comments;

class UserController extends Controller
{
    //
    public function getDanhSach()
    {
    	$user = User::all();
    	return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getThem()
    {
    	return view('admin.user.them');	
    }

    public function postThem(Request $request)
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
        $user->type = $request->type;
        $user->save();

        return redirect('admin/user/add')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $user = User::whereid($id)->get();
        return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $request, $id)
    {
        $user = User::whereid($id)->first();
        $this->validate($request,
            [
                'name' => 'required|max:100'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên người dùng',
                'name.max'=>'Tên người có độ dài tối đa là 100 ký tự'
            ]);
        $user->name = $request->name;
        $user->type = $request->type;
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
        return redirect('admin/user/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $tour_comment = Tour_Comments::whereuser_id($id)->first();
        if($tour_comment != null)
            $tour_comment->delete();
        $user = User::whereid($id)->first();
        $user->delete();

        return redirect('admin/user/list')->with('thongbao','Xoá thành công');
    }

    public function getdangnhapAdmin()
    {
        return view('admin.login');
    }

    public function postdangnhapAdmin(Request $request)
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
        $user = User::where([['email','=',$request->email],['type','=','1']])->first();
        if($user){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
            {
                return redirect('admin/tourbooking/list');
            }
            else
            {
            return redirect('admin/login')->with('thongbao','Tài khoản không tồn tại hoặc sai mật khẩu');
            }
        }
        else
        {
            return redirect('admin/login')->with('thongbao','Tài khoản không phải admin');
        }
        
    }

    public function getdangxuatAdmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
