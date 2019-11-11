@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tour
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
                                <th>Tour</th>
                                <th>Nổi bật</th>
                                <th>Hình ảnh</th>
                                <th>Nội dung</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tourdetail as $td)
                                <tr class="even gradeC" align="center">
                                    <td>{{$td->id}}</td>
                                    <td>{{$td->tours->name}}</td>
                                    <td>{{$td->highlight}}</td>
                                    <td><img width="100px" src="upload/images/{{$td->image}}"></td>
                                    <td>{{$td->content}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tourdetail/delete/{{$td->id}}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tourdetail/edit/{{$td->id}}"> Sửa</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->

@endsection