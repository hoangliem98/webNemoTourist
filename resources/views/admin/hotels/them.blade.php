@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách sạn
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
                        <form action="admin/hotel/add" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên khách sạn</label>
                                <input class="form-control" name="name" placeholder="Tên khách sạn" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" placeholder="Địa chỉ" />
                            </div>
                            <div class="form-group">
                                <label>Liên hệ</label>
                                <input class="form-control" name="contact" placeholder="Liên hệ" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="about" ></textarea> 
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" class="form-control ckeditor" rows="3" name="content" ></textarea>
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
                                <label>Đánh giá</label>
                                <input class="form-control" name="star_rating" placeholder="Đánh giá" />
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
