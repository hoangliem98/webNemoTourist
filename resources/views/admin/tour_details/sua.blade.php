@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tour Detail
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
                        @foreach($tourdetail as $td)
                            <form action="admin/tourdetail/edit/{{$td->id}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    <label>Tour</label>
                                    <select class="form-control" name="tour" id="tours">
                                        @foreach($tours as $t)
                                        <option 
                                            @if($td->tour_id ==  $t->id)
                                                {{"selected"}}
                                            @endif value="{{$t->id}}">{{$t->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nổi bật</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="about">{{$td->about}}</textarea> 
                                </div>
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea id="demo" class="form-control ckeditor" rows="3" name="content" >{{$td->content}}</textarea> 
                                </div>
                                <div class="form-group">
                                    <label>Hình</label>
                                    <p>
                                    <img width="400px" src="upload/images/{{$td->image}}" />
                                    </p>
                                    <input type="file" class="form-control" name="image" />
                                </div>
                                <button type="submit" class="btn btn-success">Sửa</button>
                                
                            <form>
                        @endforeach
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tour Comment
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tourdetail as $td)
                                @foreach($td->tour_comments as $cm)
                                    <tr class="even gradeC" align="center">
                                        <td>{{$cm->id}}</td>
                                        <td>{{$cm->user->name}}</td>
                                        <td>{{$cm->content}}</td>
                                        <td>{{$cm->created_at}}</td>
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/delete/{{$cm->id}}/{{$td->id}}"> Xóa</a></td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->

@endsection
{{-- @section('script')
    <script>
        $(document).ready(function(){
            $("#tourcategory").change(function(){
                var tourcate_id = $(this).val();
                $.get("admin/ajax/tour/"+tourcate_id,function(data){
                    $("#tours").html(data);
                });
            });
        });
    </script>
@endsection --}}