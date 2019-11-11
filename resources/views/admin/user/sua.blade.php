@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
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
                        @foreach($user as $u)
                        <form action="admin/user/edit/{{$u->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="name" placeholder="Vui lòng nhập tên người dùng" value="{{$u->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Vui lòng nhập email" value="{{$u->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="changepass" name="changepass">
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Vui lòng nhập mật khẩu mới" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" class="form-control password" name="passagain" placeholder="Vui lòng nhập lại mật khẩu" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                    <input name="type" value="0"
                                    @if($u->type == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Thường
                                </label>
                                <label class="radio-inline">
                                    <input name="type" value="1" 
                                    @if($u->type == 1)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Admin
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

@section('script')
    <script>
        $(document).ready(function(){
            $("#changepass").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection
