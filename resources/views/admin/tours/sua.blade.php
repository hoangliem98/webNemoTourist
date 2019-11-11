@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tour
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
                        @foreach($tours as $t)
                            <form action="admin/tour/edit/{{$t->id}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    <label>Tên tour</label>
                                    <input class="form-control" name="name" placeholder="Tên tour" value="{{$t->name}} "/>
                                </div>
                                <div class="form-group">
                                    <label>Đi từ</label>
                                    <input class="form-control" name="go_from" placeholder="Nơi đi" value="{{$t->go_from}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Đi đến</label>
                                    <input class="form-control" name="go_to" placeholder="Nơi đến" value="{{$t->go_to}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="about" >{{$t->about}}"</textarea> 
                                </div>
                                <div class="form-group">
                                    <label>Hình</label>
                                    <p>
                                    <img width="400px" src="upload/images/{{$t->image}}" />
                                    </p>
                                    <input type="file" class="form-control" name="image" />
                                </div>
                                <div class="form-group">
                                    <label>Loại tour</label>
                                    <select class="form-control" name="tour_category">
                                        @foreach($tourcategory as $tc)
                                        <option 
                                        @if($t->tourcate_id ==  $tc->id)
                                            {{"selected"}}
                                        @endif 
                                            value="{{$tc->id}}">{{$tc->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Giá tiền</label>
                                    <input class="form-control" name="price" placeholder="Giá tiền" value="{{$t->price}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Giảm giá</label>
                                    <input class="form-control" name="discount" placeholder="Giảm giá" value="{{$t->discount}}"/>
                                </div>
                                <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="highlight" value="0"
                                    @if($t->highlight == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="highlight" value="1" 
                                    @if($t->highlight == 1)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Có
                                </label>
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