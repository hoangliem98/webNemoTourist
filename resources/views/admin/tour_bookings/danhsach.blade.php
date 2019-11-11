@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đặt tour
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tour</th>
                                <th>Khách hàng</th>
                                <th>Số người</th>
                                <th>Ngày đặt</th>
                                <th>Thông tin đơn</th>
                                <th>Tổng tiền</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tourbooking as $tb)
                                <tr class="even gradeC" align="center">
                                    <td>{{$tb->id}}</td>
                                    <td>{{$tb->tours->name}}</td>
                                    <td>{{$tb->customers->first_name}} {{$tb->customers->last_name}}</td>
                                    <td>{{$tb->number_of_people}}</td>
                                    <td>{{$tb->date_booking}}</td>
                                    <td>{{$tb->details}}</td>
                                    <td>{{number_format($tb->total_price)}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tourbooking/delete/{{$tb->id}}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tourbooking/edit/{{$tb->id}}"> Sửa</a></td>
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