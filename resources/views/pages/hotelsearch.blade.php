@extends('layout.index')
@section('content')
    <div class="page-header">
     	<div class="page-caption">
            <h1 class="page-title">Tìm: {{$key}}</h1>
        </div>
    </div>{{-- 
    <form>
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-8 d-none d-xl-block d-sm-block">
                </div>
                <div class="col-xl-6 col-lg-6 col-md-8 d-none d-xl-block d-sm-block">
                    <input id="" type="text" name="hotelsearch" placeholder="Tìm kiếm khách sạn bằng từ khóa" class="form-control hotelsearch">
                </div>
                <div class="col-xl-2 col-lg-2 col-md-8 d-none d-xl-block d-sm-block">
                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-8 d-none d-xl-block d-sm-block">
                </div>
            </div>
        </div>
    </form> --}}
    
    <hr width="90%" size="100px" align="center"/>
<!-- /.page-header-->
		<!-- destination-section -->
        <div class="content">
            <div class="container">
                <div class="row">
                    @foreach($hotel as $h)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <!-- destination-section -->
                        <div class="destination-block">
                            <div class="desti-img">
                                <img src="upload/images/hotel/{{$h->image}}" height="360px">
                                <a href="#" class="desti-title">{{$h->name}}</a>
                                <div class="overlay"></div>
                                <div class="text">
                                    <ul class="angle list-none">
                                        @foreach(explode('/n', $h->about) as $hh)
                                        <li>{{$hh}}</li>
                                        @endforeach
                                        <li>Đánh giá: {{$h->star_rating}} sao</li>
                                    </ul>
                                    <p class="price">{{number_format($h->price)}} <small>đồng/đêm</small></p>
                                    <a href="{{route('hotel-detail', $h->id)}}" class="btn-link">Xem ngay <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
		<!-- /.destination-section -->
                    </div>
                    @endforeach
                </div>   
                <div class="row">{{$hotel->links()}}</div>      
            </div>
@endsection
@section('title')Tìm {{$key}}
@endsection
