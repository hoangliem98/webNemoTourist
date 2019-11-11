@extends('layout.index')
@section('content')		
	<div class="page-header" style="background: url(upload/images/hotel/{{$hotel->image}}) no-repeat; background-size: 100% 700px; height: 500px; margin: 0px; padding-top: 375px; padding-bottom: 0px; border: 0px; background-position: center; ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-caption">
                        <h1 class="page-title">Đặt khách sạn</h1>
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
                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12 mb30">
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
                            <form method="POST" action="hotel-booking/{{$hotel->id}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <h4 class="tour-form-title">Chi tiết khách sạn</h4>
                                    </div>
                                    <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label required" for="select">Tên khách sạn</label>
                                            <input id="hotel" name="tour" type="text" placeholder="Tên" class="form-control" value="{{$hotel->name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="datepicker">Ngày bắt đầu thuê</label>
                                            <div class="input-group">
                                                <input id="datepicker" name="booking_start_date" type="text" placeholder="Ngày bắt đầu" class="form-control" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label required" for="select">Số lượng phòng: (chọn số lượng phòng trước)</label>
                                            <input id="number_room" name="number_of_room" type="number" placeholder="Vui lòng nhập số lượng phòng" value="1" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label required" for="select">Thời gian thuê (ngày)</label>
                                            <input id="time" name="time" type="number" placeholder="Vui lòng nhập thời gian thuê" value="1" class="form-control" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label required" for="select">Tổng tiền (VNĐ):</label>
                                            <input name="total_price" id="price" class="form-control" placeholder = "Tiền khách sạn: {{number_format($hotel->price)}} VNĐ" value="{{$hotel->price}}"  readonly required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt30">
                                        <h4 class="tour-form-title">Thông tin cá nhân</h4>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Tên</label>
                                            <input id="first_name" type="text" placeholder="First Name" name="first_name" class="form-control" required>
                                            <input id="name" name="last_name" type="text" placeholder="Last Name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="country">Địa chỉ: </label>
                                            <input id="address" name="address" type="text" placeholder="Địa chỉ" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="email"> Email</label>
                                            <input id="email" type="text" name="email" placeholder="xxxx@xxxx.xxx" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="phone"> Số điện thoại:</label>
                                            <input id="phone" type="text" name="phone_number" placeholder="+84" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="textarea">Lời nhắn</label>
                                            <textarea class="form-control" name="details" id="detail" name="textarea" rows="4" placeholder="Lời nhắn"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <button id="submit" type="button" name="singlebutton" class="btn btn-primary" data-toggle="modal" data-target="#resultModal">Xem lại đơn hàng</button>
                                        <button type="submit" name="singlebutton" class="btn btn-primary">Đặt hàng</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form>
                                        <div class="search-form">
                                            <p>Tên khách hàng: <span id="customer1"></span></p><hr>
                                            <p>Địa chỉ: <span id="address1"></span></p><hr>
                                            <p>Email: <span id="email1"></span></p><hr>
                                            <p>Số điện thoại: <span id="phone1"></span></p><hr>
                                            <p>Khách sạn: <span id="hotel1"></span></p><hr>
                                            <p>Số phòng: <span id="number1"></span> phòng</p><hr>
                                            <p>Ngày bắt đầu thuê: <span id="date1"></span></p><hr>
                                            <p>Thời gian thuê: <span id="time1"></span> ngày</p><hr>
                                            <p>Lời nhắn: <span id="detail1"></span></p><hr>
                                            <p>Tổng tiền: <span id="total1"></span> đồng</p><hr>
                                            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">Đóng</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12 ">
                        <div class="widget-primary support-list">
                            <div class="widget-primary-title">
                                <h3>Tại sao nên đến với chúng tôi ?</h3>
                            </div>
                            <ul class="arrow list-none">
                                <li>Hỗ trợ dịch vụ 24/7</li>
                                <li>Giải quyết khiếu nại hợp lý</li>
                                <li>Đội ngũ tận tâm, đáng tin cậy</li>
                                <li>Dịch vụ chuyên nghiệp</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('title'){{$hotel->name}} - Đặt hàng
@endsection
@section('script')
    <script>
    $(document).ready(function(){
        price = {{$hotel->price}};   
        $("#number_room").on('change keyup', function() {
        	room = $("#number_room").val();
        	if(room <= 0)
        	{
        		$("#number_room").val(1);
                alert('Không hợp lệ. Số lượng phòng phải ít nhất 1 phòng');     
            }
            else {$("#price").val(price * room);}
            firstprice = $("#price").val();
            $("#time").removeAttr('readonly');
            $("#time").on('change keyup', function() {
            	$("#number_room").attr('readonly','');
            	time = $("#time").val();
            	if(time <= 0)
            	{
            		$("#time").val(1);
            		alert('Thời gian thuê không hợp lệ');
            	}
            	else {totalprice = $("#price").val(firstprice * time);}
            });
        });

        $("#submit").click(function(){
            var name = $("#first_name").val();
            $("#customer1").html(name);

            var address = $("#address").val();
            $("#address1").html(address);

            var email = $("#email").val();
            $("#email1").html(email);

            var phone = $("#phone").val();
            $("#phone1").html(phone);

            var hotel = $("#hotel").val();
            $("#hotel1").html(hotel);

            var room = $("#number_room").val();
            $("#number1").html(room);

            var date = $("#datepicker").val();
            $("#date1").html(date);

            var time = $("#time").val();
            $("#time1").html(time);

            var detail = $("#detail").val();
            $("#detail1").html(detail);

            var total = $("#price").val();
            $("#total1").html(total);
        });           
    });
    </script>

    <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"><script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">$(function(){  
        $("#datepicker")
        .datepicker({         
            autoclose: true,         
            format: 'yyyy-m-d',
            todayHighlight: true
        });
    });
    </script>
@endsection