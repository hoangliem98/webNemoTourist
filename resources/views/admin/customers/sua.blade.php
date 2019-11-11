@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa danh mục
                            <small>Tin Tức</small>
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
                    @foreach($customer as $c)
                        <form action="admin/customer/edit/{{$c->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" name="first_name" placeholder="Vui lòng nhập first name" value="{{$c->first_name}}" />
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" name="last_name" placeholder="Vui lòng nhập last name" value="{{$c->last_name}}"/>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" placeholder="Vui lòng nhập địa chỉ" value="{{$c->address}}"/>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone_number" placeholder="Vui lòng nhập số điện thoại" value="{{$c->phone_number}}"/>
                            </div>
                            
                            <button type="submit" class="btn btn-success">Sửa</button>
                        </form>
                    @endforeach
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->

@endsection