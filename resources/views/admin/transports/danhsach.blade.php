@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thuê xe
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
                                <th>Tên</th>
                                <th>Giá tiền</th>
                                <th>Nổi bật</th>
                                <th>Nội dung</th>
                                <th>Hình ảnh</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transport as $tp)
                                <tr class="even gradeC" align="center">
                                    <td>{{$tp->id}}</td>
                                    <td>{{$tp->name}}</td>
                                    <td>{{$tp->price}}</td>
                                    <td>{{$tp->highlight}}</td>
                                    <td>{{$tp->content}}</td>
                                    <td><img width="100px" src="upload/images/transport/{{$tp->image}}"></td> 
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/transport/delete/{{$tp->id}}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/transport/edit/{{$tp->id}}">Sửa</a></td>
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