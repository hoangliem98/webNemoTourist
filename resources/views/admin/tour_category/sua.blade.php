@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại tour 
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
                        <form action="admin/tourcategory/edit/{{$tourcategory->id}}" method="POST">
                            <!--input type="hidden" name="_token" value="{{csrf_token()}}"/-->
                            @csrf 
                            <div class="form-group">
                                <label>Tên loại tour</label>
                                <input class="form-control" name="name"  placeholder="Điền tên loại tour" value="{{$tourcategory->name}}" />
                            </div>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                            <button type="reset" class="btn btn-success">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
<!-- /#page-wrapper -->

@endsection
