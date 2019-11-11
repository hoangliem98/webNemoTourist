<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Tourinside;
Route::get('/', function () {
    return "Trang chưa tồn tại";
});

Route::get('admin/login','UserController@getdangnhapAdmin');
Route::post('admin/login','UserController@postdangnhapAdmin');

Route::get('admin/logout','UserController@getdangxuatAdmin');
Route::post('admin/logout','UserController@postdangnhapAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'tourcategory'],function(){
		Route::get('list','TourCateController@getDanhSach');

		Route::get('add','TourCateController@getThem');
		Route::post('add','TourCateController@postThem');

		Route::get('edit/{id}','TourCateController@getSua');
		Route::post('edit/{id}','TourCateController@postSua');

		Route::get('delete/{id}','TourCateController@getXoa');
	});

	Route::group(['prefix'=>'tour'],function(){
		Route::get('list','TourController@getDanhSach')->name('tourList');;

		Route::get('add','TourController@getThem');
		Route::post('add','TourController@postThem');

		Route::get('edit/{id}','TourController@getSua');
		Route::post('edit/{id}','TourController@postSua');

		Route::get('delete/{id}','TourController@getXoa');
	});

	Route::group(['prefix'=>'tourdetail'],function(){
		Route::get('list','TourDetailController@getDanhSach');

		Route::get('add','TourDetailController@getThem');
		Route::post('add','TourDetailController@postThem');

		Route::get('edit/{id}','TourDetailController@getSua');
		Route::post('edit/{id}','TourDetailController@postSua');

		Route::get('delete/{id}','TourDetailController@getXoa');
	});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('tour/{tourcate_id}','AjaxController@getTour');
	});

	Route::group(['prefix'=>'tourbooking'],function(){
		Route::get('list','TourBookingController@getDanhSach');

		Route::get('edit/{id}','TourBookingController@getSua');
		Route::post('edit/{id}','TourBookingController@postSua');

		Route::get('delete/{id}','TourBookingController@getXoa');
	});
	Route::group(['prefix'=>'comment'],function(){
		Route::get('delete/{id}/{tourdetail_id}','TourCommentController@getXoa');
	});
	
	Route::group(['prefix'=>'bookingstatus'],function(){
		Route::get('list','BookingStatusController@getDanhSach');
	});

	Route::group(['prefix'=>'customer'],function(){
		Route::get('list','CustomerController@getDanhSach');

		Route::get('add','CustomerController@getThem');
		Route::post('add','CustomerController@postThem');

		Route::get('edit/{id}','CustomerController@getSua');
		Route::post('edit/{id}','CustomerController@postSua');

		Route::get('delete/{id}','CustomerController@getXoa');
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('list','UserController@getDanhSach');

		Route::get('add','UserController@getThem');
		Route::post('add','UserController@postThem');

		Route::get('edit/{id}','UserController@getSua');
		Route::post('edit/{id}','UserController@postSua');

		Route::get('delete/{id}','UserController@getXoa');
	});

	Route::group(['prefix'=>'hotel'],function(){
		Route::get('list','HotelController@getDanhSach');

		Route::get('add','HotelController@getThem');
		Route::post('add','HotelController@postThem');

		Route::get('edit/{id}','HotelController@getSua');
		Route::post('edit/{id}','HotelController@postSua');

		Route::get('delete/{id}','HotelController@getXoa');
	});

	Route::group(['prefix'=>'hotelbooking'],function(){
		Route::get('list','HotelBookingController@getDanhSach');

		Route::get('edit/{id}','HotelBookingController@getSua');
		Route::post('edit/{id}','HotelBookingController@postSua');

		Route::get('delete/{id}','HotelBookingController@getXoa');
	});

	Route::group(['prefix'=>'transport'],function(){
		Route::get('list','TransportController@getDanhSach');

		Route::get('add','TransportController@getThem');
		Route::post('add','TransportController@postThem');

		Route::get('edit/{id}','TransportController@getSua');
		Route::post('edit/{id}','TransportController@postSua');

		Route::get('delete/{id}','TransportController@getXoa');
	});

	Route::group(['prefix'=>'transportbooking'],function(){
		Route::get('list','TransportBookingController@getDanhSach');

		Route::get('edit/{id}','TransportBookingController@getSua');
		Route::post('edit/{id}','TransportBookingController@postSua');

		Route::get('delete/{id}','TransportBookingController@getXoa');
	});

});


Route::get('home','PageController@gettrangchu')->name('home');
Route::get('tour-category/{tourcate_id}','PageController@getloaitour')->name('tour-category');
Route::get('tour-detail/{tour_id}','PageController@getchitiettour')->name('tour-detail');
Route::get('hotel','PageController@getkhachsan')->name('hotel');
Route::get('hotel-detail/{id}','PageController@getchitietkhachsan')->name('hotel-detail');
Route::get('transport','PageController@getgoithuexe')->name('transport');
Route::get('transport-detail/{id}','PageController@getchitietthuexe')->name('transport-detail');
Route::get('tour-booking/{id}','PageController@getbooking')->name('tour-booking');
Route::post('tour-booking/{id}','PageController@postbooking')->name('tour-booking');
Route::get('hotel-booking/{id}','PageController@getbookingks')->name('hotel-booking');
Route::post('hotel-booking/{id}','PageController@postbookingks')->name('hotel-booking');
Route::get('transport-booking/{id}','PageController@getbookingxe')->name('transport-booking');
Route::post('transport-booking/{id}','PageController@postbookingxe')->name('transport-booking');
Route::get('contact','PageController@getlienhe')->name('contact');
Route::post('booking','PageController@getdathang')->name('booking');
Route::get('login','PageController@getdangnhap')->name('login');
Route::post('login','PageController@postdangnhap')->name('login');
Route::get('signup','PageController@getdangky')->name('signup');
Route::post('signup','PageController@postdangky')->name('signup');
Route::get('logout','PageController@getdangxuat')->name('logout');
Route::get('user','PageController@getnguoidung')->name('user');
Route::post('user','PageController@postnguoidung')->name('user');
Route::get('search', 'PageController@gettimkiem')->name('search');
Route::get('hotelsearch', 'PageController@gettimkiemks')->name('hotelsearch');
Route::get('login/{provider}','SocialController@redirect')->name('provider_login');

Route::get('login/{provider}/callback','SocialController@callback')->name('provider_login_callback');
Route::get('/hotelhere','AjaxController@getkhachsan');
Route::get('/hotelprice','AjaxController@getTien');
Route::get('admin/tourprice','AjaxController@getTientour');

Route::resource('tour-table', 'TourController');

Route::post('tour-table/add','TourController@Add')->name('tour.add');

Route::post('tour-table/update', 'TourController@update')->name('tour.update');

Route::get('tour-table/{id}/edit','TourController@edit');

Route::get('tour-table/destroy/{id}', 'TourController@destroy');
