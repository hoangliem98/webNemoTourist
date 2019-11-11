@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đặt xe
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Gói xe</th>
                                <th>Khách hàng</th>
                                <th>Thời gian thuê</th>
                                <th>Ngày bắt đầu thuê</th>
                                <th>Thông tin đơn</th>
                                <th>Tổng tiền</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transportbooking as $tb)
                                <tr class="even gradeC" align="center">
                                    <td>{{$tb->id}}</td>
                                    <td>{{$tb->transports->name}}</td>
                                    <td>{{$tb->customers->first_name}} {{$tb->customers->last_name}}</td>
                                    @if($tb->transport_id == 3)
                                    <td>{{$tb->time}} ngày</td>
                                    @elseif($tb->transport_id == 4)
                                    <td>{{$tb->time}} giờ</td>
                                    @else
                                    <td>{{$tb->time}} none</td>
                                    @endif
                                    <td>{{$tb->booking_start_date}}</td>
                                    <td>{{$tb->details}}</td>
                                    <td>{{number_format($tb->total_price)}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/transportbooking/delete/{{$tb->id}}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/transportbooking/edit/{{$tb->id}}"> Sửa</a></td>
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