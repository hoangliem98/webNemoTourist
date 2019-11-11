@extends('layout.index')
@section('content')
    <div class="page-header" style="background: url(upload/images/transport/transport-wall.jpg) no-repeat; background-size: 100% 700px; height: 500px; margin: 0px; padding-top: 375px; padding-bottom: 0px; border: 0px; background-position: center; ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-caption">
                            <h1 class="page-title">Thuê xe</h1>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <hr width="90%" size="100px" align="center"/>
<!-- /.page-header-->
		<!-- destination-section -->
        <div class="content">
            <div class="container">
                <div class="row">
                    @foreach($transport as $tp)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <!-- destination-section -->
                        <div class="destination-block">
                            <div class="desti-img">
                                <img src="upload/images/transport/{{$tp->image}}" height="360px">
                                <a href="#" class="desti-title">{{$tp->name}}</a>
                                <div class="overlay"></div>
                                <div class="text">
                                    <ul class="angle list-none">
                                        <li>{{$tp->highlight}}</li>
                                    </ul>
                                    <p class="price">{{number_format($tp->price)}} <small>đồng</small></p>
                                    <a href="{{route('transport-detail', $tp->id)}}" class="btn-link">Xem ngay <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
		<!-- /.destination-section -->
                    </div>
                    @endforeach
                </div>   
                <div class="row">{{$transport->links()}}</div>      
            </div>
@endsection
@section('title')Thuê xe
@endsection
