@extends('layout.index')
@section('content')		
	<div class="page-header" style="background: url(upload/images/{{$tour->image}}) no-repeat; background-size: 100% 700px; height: 500px; margin: 0px; padding-top: 375px; padding-bottom: 0px; border: 0px; background-position: center; ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-caption">
                        <h1 class="page-title">Đặt tour</h1>
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
                            <form method="POST" action="tour-booking/{{$tour->id}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <h4 class="tour-form-title">Chi tiết tour</h4>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label required" for="select">Tên tour</label>
                                            <input id="tour" name="tour" type="text" placeholder="Tên" class="form-control" value="{{$tour->name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Khách sạn</label>
                                            <select class="form-control" id="hotel" name="hotelname">
                                                    <option value="0" disabled="true" selected="true">Vui lòng chọn khách sạn</option>
                                                @foreach($hotelhere as $hh)
                                                    <option value="{{$hh->id}}" data-divid="upload/images/hotel/{{$hh->image}}">{{$hh->name}}. Đánh giá: {{$hh->star_rating}} sao</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label required" for="select">Số người:</label>
                                            <input id="number_people" name="number_of_people" type="number" size="2" placeholder="Vui lòng chọn số người" class="form-control" value="1" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label required" for="select">Tổng tiền (VNĐ):</label>
                                            <input name="total_price" id="price" class="form-control" placeholder = "Tiền tour: {{number_format($tour->price)}} VNĐ" value="{{$tour->price}}" readonly required>
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
                                            <p>Đi tour: <span id="tour1"></span></p><hr>
                                            <p>Khách sạn: <span id="hotel1"></span></p><hr>
                                            <p>Số người đi: <span id="number1"></span> người</p><hr>
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
@section('title')Đặt tour {{$tour->name}}
@endsection
@section('script')
    <script>
    $(document).ready(function(){
        $("#hotel").change(function() {
            
            var hotel_id=$(this).val();

            var a = $(this).parent();
            console.log(hotel_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('hotelprice')!!}',
                data:{'id':hotel_id},
                success:function(data){
                    console.log("price");
                    console.log(data.price);
                    a = $("#price").val(data.price + {{$tour->price}});
                    c = a.val(data.price + {{$tour->price}});
                    c = c.val();
                },
                error:function(){
                }
            });
            $("#number_people").removeAttr('readonly');
            $("#number_people").on('change keyup', function() {
            $("#hotel").attr('readonly','');
            var b = $("#number_people").val();
            if(b <= 0) 
            {
                alert('Không hợp lệ. Số người đi phải ít nhất 1 người');
                $("#number_people").val(1);
            }
            else {a = $("#price").val(b * c);}
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

            var tour = $("#tour").val();
            $("#tour1").html(tour);

            var hotel = $("#hotel").val();
            $("#hotel1").html(hotel);

            var number = $("#number_people").val();
            $("#number1").html(number);

            var detail = $("#detail").val();
            $("#detail1").html(detail);

            var total = $("#price").val();
            $("#total1").html(total);
        });           
    });
    </script>
@endsection