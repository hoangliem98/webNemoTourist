@extends('layout.index')
@section('content')
    <div class="page-header">
     	<div class="page-caption">
            <h1 class="page-title">Tìm kiếm: {{$key}}</h1>
        </div>
    </div>
    <hr width="90%" size="100px" align="center"/>
<!-- /.page-header-->
		<!-- destination-section -->
        <div class="content">
            <div class="container">
                <div class="row">
                    @foreach($tour as $t)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <!-- destination-section -->
                        <div class="destination-block">
                            <div class="desti-img">
                                <img src="upload/images/{{$t->image}}" height="360px">
                                <a href="#" class="desti-title">{{$t->name}}</a>
                                <div class="overlay"></div>
                                <div class="text">
                                    <ul class="angle list-none">
                                        <li>{{$t->about}}</li>
                                    </ul>
                                    <p class="price">{{number_format($t->price)}}</p>
                                    <a href="{{route('tour-detail', $t->id)}}" class="btn-link">Xem ngay <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
		<!-- /.destination-section -->
                    </div>
                    @endforeach
                </div>   
                <div class="row">{{$tour->links()}}</div>      
            </div> 
@endsection
@section('title')Tìm kiếm {{$key}}
@endsection
