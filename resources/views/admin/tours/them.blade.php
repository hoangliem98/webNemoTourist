@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tour
                            <small>Thêm</small>
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
                        <form action="admin/tour/add" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên tour</label>
                                <input class="form-control" name="name" placeholder="Tên tour" />
                            </div>
                            <div class="form-group">
                                <label>Đi từ</label>
                                <input class="form-control" name="go_from" placeholder="Nơi đi" />
                            </div>
                            <div class="form-group">
                                <label>Đi đến</label>
                                <input class="form-control" name="go_to" placeholder="Nơi đến" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="about" ></textarea>
                            </div><div class="form-group">
                                <label>Loại tour</label>
                                <select class="form-control" name="tour_category" id="tourcategory">
                                    @foreach($tourcategory as $tc)
                                    <option value="{{$tc->id}}">{{$tc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" class="form-control" name="image"  />
                            </div>
                            <div class="form-group">
                                <label>Giá tiền</label>
                                <input class="form-control" name="price" placeholder="Giá tiền" />
                            </div>
                            <div class="form-group">
                                <label>Giảm giá</label>
                                <input class="form-control" name="discount" placeholder="Giảm giá" />
                            </div>
                            <div class="form-group">
                                <label>Ngày bắt đầu</label>
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control" name="from_date" placeholder="Từ ngày" />
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ngày kết thúc</label>
                                <div class="input-group date" id="datepicker2">
                                    <input type="text" class="form-control" name="to_date" placeholder="Đến ngày" />
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="highlight" value="1" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="highlight" value="0" checked="" type="radio">Không
                                </label>   
                            </div>
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                            
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
        $("#datepicker2")
        .datepicker({         
            autoclose: true,         
            format: 'yyyy-m-d',
            todayHighlight: true
        });
    });
    </script>
@endsection
