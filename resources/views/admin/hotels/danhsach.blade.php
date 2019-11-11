@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách sạn
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
                                <th>Địa chỉ</th>
                                <th>Liên hệ</th>
                                <th>Giá tiền</th>
                                <th>Nội dung</th>
                                <th>Đánh giá</th>
                                <th>Hình ảnh</th>
                                <th>Mô tả</th>
                                <th>Nổi bật</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hotel as $h)
                                <tr class="even gradeC" align="center">
                                    <td>{{$h->id}}</td>
                                    <td>{{$h->name}}</td>
                                    <td>{{$h->address}}</td>
                                    <td>{{$h->contact}}</td>
                                    <td>{{$h->price}}</td>
                                    <td>{{$h->content}}</td>
                                    <td>{{$h->star_rating}} sao</td>
                                    <td><img width="100px" src="upload/images/hotel/{{$h->image}}"></td>
                                    <td>{{$h->about}}</td>
                                    <td>
                                    @if($h->highlight == 1)
                                        {{"Có"}}
                                    @else
                                        {{"Không"}}
                                    @endif
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hotel/delete/{{$h->id}}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/hotel/edit/{{$h->id}}">Sửa</a></td>
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