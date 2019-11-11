@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thuê xe
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
                        @foreach($transport as $tp)
                            <form action="admin/transport/edit/{{$tp->id}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    <label>Tên gói thuê xe</label>
                                    <input class="form-control" name="name" placeholder="Tên gói thuê xe" value="{{$tp->name}} "/>
                                </div>
                                <div class="form-group">
                                    <label>Nổi bật</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="highlight" >{{$tp->highlight}}"</textarea> 
                                </div>
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="content" >{{$tp->content}}"</textarea> 
                                </div>
                                <div class="form-group">
                                    <label>Hình</label>
                                    <p>
                                    <img width="400px" src="upload/images/transport/{{$tp->image}}" />
                                    </p>
                                    <input type="file" class="form-control" name="image" />
                                </div>
                                <div class="form-group">
                                    <label>Giá tiền</label>
                                    <input class="form-control" name="price" placeholder="Giá tiền" value="{{$tp->price}}"/>
                                </div>
                                <button type="submit" class="btn btn-success">Sửa</button>
                                
                            <form>
                        @endforeach
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->

@endsection