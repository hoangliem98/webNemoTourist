@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đặt tour
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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

                        @if(session('loi'))
                            <div class="alert alert-danger">
                                {{session('loi')}}
                            </div>
                        @endif
                        @foreach($tourbooking as $tb)
                        <form action="admin/tourbooking/edit/{{$tb->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tour</label>
                                <select id="tour" class="form-control" name="tour">
                                    @foreach($tour as $t)
                                        <option 
                                            @if($tb->tour_id ==  $t->id)
                                                {{"selected"}}
                                            @endif value="{{$t->id}}">{{$t->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Khách hàng</label>
                                <select class="form-control" name="customer" disabled>
                                    @foreach($customer as $c)
                                        <option 
                                            @if($tb->customer_id ==  $c->id)
                                                {{"selected"}}
                                            @endif value="{{$c->id}}">{{$c->first_name}} {{$c->last_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ngày đăng kí</label>
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control" name="date_booking" value="{{$tb->date_booking}}"/>
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Thông tin đơn</label>
                                <input class="form-control" rows="3" name="details" placeholder="Thông tin đơn" value="{{$tb->details}}" />
                            </div>
                            <div class="form-group">
                                <label>Số người đi</label>
                                <input id="number_people" class="form-control" type="number" name="number_of_people" placeholder="Số người đi" value="{{$tb->number_of_people}}" />
                            </div>
                            <div class="form-group">
                                <label>Tổng tiền</label>
                                <input id="price" class="form-control" name="total_price" placeholder="Tổng tiền" value="{{$tb->total_price}}" readonly="" />
                            </div>
                            <button type="submit" class="btn btn-success">Sửa</button>
                        @endforeach   
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->

@endsection
@section('script')
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
    <script>
    $(document).ready(function(){
        @foreach($tourbooking as $tb)
        @foreach($tour as $t)
            @if($tb->tour_id ==  $t->id)
                tempprice = {{$tb->tours->price}};
            @endif
        @endforeach
        @endforeach
        temp = $("#number_people").val();
        $("#tour").change(function() {    
            var tour_id=$(this).val();
            var a = $(this).parent();
            total_price = {{$tb->total_price}};
            $("#number_people").val({{$tb->number_of_people}});
            console.log(tour_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('admin/tourprice')!!}',
                data:{'id':tour_id},
                success:function(data){
                    console.log("price");
                    console.log(data.price);
                    a = $("#price").val((((total_price / temp) - tempprice) + data.price) * temp);
                    c = $("#price").val();
                },
                error:function(){
                }
            });
            $("#number_people").on('change keyup', function() {
            var b = $("#number_people").val();
            if(b <= 0){alert('Số người không hợp lệ. Ít nhất là 1 người');}
            else {$("#price").val((c / temp) * b) ;}
            });
        });
    }); 

    $(document).ready(function(){
        temp = $("#number_people").val();
        $("#number_people").on('change keyup', function() {
        var b = $("#number_people").val();
        var c = {{$tb->total_price}};
        if(b <= 0){alert('Số người không hợp lệ. Ít nhất là 1 người');}
        else {$("#price").val((c / temp) * b) ;}
        });
    });
    </script>
@endsection
