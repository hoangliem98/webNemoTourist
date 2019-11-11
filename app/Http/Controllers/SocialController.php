<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use Socialite;
use App\social_provider;
use App\User;
class SocialController extends Controller
{
    //
    public function redirect($providers)
   	{
       	return Socialite::driver($providers)->redirect();
   	}
   	public function callback($providers)
   	{
    try{
      $socialiteUser = Socialite::driver($providers)->user();
    }
    catch(\Exception $e)
    {
       return redirect()->route('login')->with(['loi'=>'Đăng nhập không thành công. Hãy thử lại!']);
    }
    $socialProvider = social_provider::where('provider_id',$socialiteUser->getId())->first();
    if(!$socialProvider){
      $user = User::where('email',$socialiteUser->getEmail())->first();
      if($user) 
        return redirect()->route('login')->with(['loi'=>'Lỗi đăng nhập, email đã có người sử dụng']);
    else{
      	$user = new User();
      	$user->email = $socialiteUser->getEmail();
     	  $user->name  = $socialiteUser->getName();
      	$user->save();
     	}
     	$provider = new social_provider();
     	$provider->provider_id = $socialiteUser->getId();
     	$provider->provider = $providers;
     	$provider->email = $socialiteUser->getEmail();
     	$provider->save();
   	}
   	else{
    	$user = User::where('email',$socialiteUser->getEmail())->first();
   	}
   	Auth()->login($user);
   	return redirect()->route('home');
  	}
}
