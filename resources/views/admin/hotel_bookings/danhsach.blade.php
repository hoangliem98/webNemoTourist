@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đặt khách sạn
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên khách sạn</th>
                                <th>Khách hàng</th>
                                <th>Thời gian thuê</th>
                                <th>Ngày bắt đầu thuê</th>
                                <th>Số lượng phòng</th>
                                <th>Thông tin đơn</th>
                                <th>Tổng tiền</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hotelbooking as $hb)
                                <tr class="even gradeC" align="center">
                                    <td>{{$hb->id}}</td>
                                    <td>{{$hb->hotels->name}}</td>
                                    <td>{{$hb->customers->first_name}} {{$hb->customers->last_name}}</td>
                                    <td>{{$hb->time}} ngày</td>
                                    <td>{{$hb->booking_start_date}}</td>
                                    <td>{{$hb->number_of_room}} phòng</td>
                                    <td>{{$hb->details}}</td>
                                    <td>{{number_format($hb->total_price)}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hotelbooking/delete/{{$hb->id}}"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/hotelbooking/edit/{{$hb->id}}"> Sửa</a></td>
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