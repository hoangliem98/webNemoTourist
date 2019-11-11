@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đặt xe
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
                        <form action="admin/transportbooking/edit/{{$transportbooking->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Gói xe</label>
                                <select id="transport" class="form-control" name="hotel">
                                    @foreach($transport as $t)
                                        <option 
                                            @if($transportbooking->transport_id ==  $t->id)
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
                                            @if($transportbooking->customer_id ==  $c->id)
                                                {{"selected"}}
                                            @endif value="{{$c->id}}">{{$c->first_name}} {{$c->last_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ngày bắt đầu</label>
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control" name="booking_start_date" value="{{$transportbooking->booking_start_date}}"/>
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                            @if($transportbooking->transport_id == 3 || $transportbooking->transport_id == 4)
                            <div class="form-group">
                                <label>Thời gian thuê</label>
                                <input id="time" class="form-control" type="number" name="time" placeholder="Thời gian thuê" value="{{$transportbooking->time}}"/>
                            </div>
                            @else
                            <div class="form-group">
                                <label>Thời gian thuê</label>
                                <input id="time" class="form-control" type="number" name="time" placeholder="Thời gian thuê" value="{{$transportbooking->time}}" readonly/>
                            </div>
                            @endif
                            <div class="form-group">
                                <label>Thông tin đơn</label>
                                <input class="form-control" rows="3" name="details" placeholder="Thông tin đơn" value="{{$transportbooking->details}}" />
                            </div>
                            <div class="form-group">
                                <label>Tổng tiền</label>
                                <input id="price" class="form-control" name="total_price" placeholder="Tổng tiền" value="{{$transportbooking->total_price}}" readonly="" />
                            </div>
                            <button type="submit" class="btn btn-success">Sửa</button> 
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
@endsection

