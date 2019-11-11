@extends('layout.index')
@section('content')	
        <div class="page-header" style="background: url(upload/images/loginwallpaper.jpg) no-repeat; background-size: 100% 700px; height: 500px; margin: 0px; padding-top: 375px; padding-bottom: 0px; border: 0px; background-position: center; ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-caption">
                            <h1 class="page-title">Đăng ký</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    	<hr width="90%" size="100px" align="center"/>
        <!-- /.page-header-->
        <!-- tour-booking -->
        <div class="content">
            <div class="container">
                <div class="row ">
                    <!-- footer-logo -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb30">
                        <div class="tour-booking-form">
                        	@if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
	                        @endif

	                        @if(session('thongbao'))
	                            <div class="alert alert-success">
	                                {{session('thongbao')}}
	                            </div>
	                        @endif
                            <form action="signup" method="post">
                            	<input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    	<div class="form-group">
                                            <label class="control-label" for="name">Họ tên</label>
                                            <input name="name" type="text" placeholder="Họ tên" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="name">Email</label>
                                            <input name="email" type="email" placeholder="Email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="name">Mật khẩu</label>
                                            <input name="password" type="password" placeholder="Mật khẩu" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="name">Nhập lại mật khẩu</label>
                                            <input name="passagain" type="password" placeholder="Nhập lại mật khẩu" class="form-control" required>
                                        </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <button type="submit" name="singlebutton" class="btn btn-primary">Đăng ký</button>
                                    </div>
                                </div>
                            </form>
                    	</div>
            		</div>
        		</div>
            </div>
        </div>
@endsection
@section('title')Đăng ký
@endsection
