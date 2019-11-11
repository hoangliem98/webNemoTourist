@extends('layout.index')
@section('content')
		<!-- slider -->
        <div class="slider">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            @if(session('loi'))
                <div class="alert alert-danger">
                    {{session('loi')}}
                </div>
            @endif
            <div class="owl-carousel owl-one owl-theme">
                <!-- item -->
                @foreach($slide as $sl)
                <div class="item">
                    <div class="slider-img">
                        <img src="upload/images/sl/{{$sl->image}}" alt=""></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="slider-captions">
                                    <h1 class="slider-title">{{$sl->content}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /.item -->
            </div>
        </div>
        <!-- /.slider -->
        <!-- tour-service -->
        <div class="space-medium">
            <div class="container">
                <!-- tour-1 -->
                <div class="row ">
                    <div class="col-xl-4 col-lg-4 offset-md-1 col-md-4 col-sm-12 col-12 mb40">
                        <div class="tour-img">
                            <a href="{{route('tour-category',1)}}" class="imghover"> <img src="upload/images/inside-index.jpg" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 offset-md-1 col-md-5 col-sm-12 col-12 mb40">
                        <div class="tour-block">
                            <div class="tour-content">
                                <h2 class="mb30"><a class="title">Tour trong nước</a></h2>
                                <p class="mb30">Trải nghiệm những chuyến du lịch thú vị trên dải đất hình chữ S quen thuộc. Đi khắp mọi miền tổ quốc. Hãy khám phá những chuyến du lịch chúng tôi mang đến cho bạn.</p>
                                <a href="{{route('tour-category',1)}}" class="btn-link">Đi đến danh sách tour trong nước<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tour-1 -->
                <!-- tour-2 -->
                <div class="row">
                    <div class="col-xl-5 col-lg-5 offset-md-1 col-md-5 col-sm-12 col-12 mb40">
                        <div class="tour-block">
                            <div class="tour-content">
                                <h2 class="mb30"><a class="title">Tour nước ngoài</a></h2>
                                <p class="mb30">Đi vòng quanh thế giới để cùng nhau tận hưởng những chuyến du lịch thú vị. Hãy khám phá những chuyến du lịch chúng tôi mang đến cho bạn.</p>
                                <a href="{{route('tour-category',2)}}" class="btn-link">Đi đến danh sách tour nước ngoài<i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 offset-md-1 col-md-4 col-sm-12 col-12 mb40">
                        <div class="tour-img">
                            <a href="{{route('tour-category',2)}}" class="imghover"> <img src="upload/images/outside-index.jpg" alt="" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
                <!-- /.tour-2 -->
            </div>
        </div>
        <!-- /.tour-service -->
        <!-- destination-section -->
        <div class="space-medium">
            <div class="container-fluid">
                <div class="row">
                    <!-- section-title -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="section-title">
                            <h2>Tour phổ biến</h2>
                        </div>
                    </div>
                    <!-- /.section-title -->
                </div>
                <div class="row">
                    @foreach($tourhighlight as $th)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 nopl nopr">
                        <!-- destination-section -->
                        <div class="destination-block">
                            <div class="desti-img">
                                <img src="upload/images/{{$th->image}}" height="360px">
                                <a href="#" class="desti-title">{{$th->name}}</a>
                                <div class="overlay">
                                </div>
                                <div class="text">
                                    <ul class="angle list-none">
                                        @foreach(explode('/n', $th->about) as $thl)
                                        <li>{{$thl}}</li>
                                        @endforeach
                                    </ul>
                                    <p class="price">Giá từ: {{number_format($th->price)}}</p>
                                    <a href="{{route('tour-detail', $th->id)}}" class="btn-link">Xem ngay<i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.destination-section --> 
                    </div>
                    @endforeach
                </div>
                <div class="row">{{$tourhighlight->links()}}</div>
            </div>
        <div class="space-medium">
            <div class="container-fluid">
                <div class="row">
                    <!-- section-title -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="section-title">
                            <h2>Khách sạn phổ biến</h2>
                        </div>
                    </div>
                    <!-- /.section-title -->
                </div>
                <div class="row">
                    @foreach($hotelhighlight as $hh)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 nopl nopr">
                        <!-- destination-section -->
                        <div class="destination-block">
                            <div class="desti-img">
                                <img src="upload/images/hotel/{{$hh->image}}" height="360px">
                                <a href="#" class="desti-title">{{$hh->name}}</a>
                                <div class="overlay">
                                </div>
                                <div class="text">
                                    <ul class="angle list-none">
                                        @foreach(explode('/n', $hh->about) as $hhl)
                                        <li>{{$hhl}}</li>
                                        @endforeach
                                    </ul>
                                    <p class="price">Giá từ: {{number_format($hh->price)}}</p>
                                    <a href="{{route('hotel-detail', $hh->id)}}" class="btn-link">Xem ngay<i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.destination-section --> 
                    </div>
                    @endforeach
                </div>
                <div class="row">{{$tourhighlight->links()}}</div>
            </div>
        <!-- /.destination-section -->
        <!-- about-section -->
        <div class="space-medium">
            <div class="container">
                <div class="row">
                    <!-- feature-section -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="well-block">
                            <!-- feature-left -->
                            <div class="feature-left">
                                <div class="feature-icon"><img src="./images/calendar.png" alt=""></div>
                                <div class="feature-content">
                                    <h4>Đảm bảo lịch trình rõ ràng</h4>
                                    <p>Lịch trình được lên kế hoạch rõ ràng, phù hợp.</p>
                                </div>
                            </div>
                            <!-- /.feature-left -->
                            <!-- feature-left -->
                            <div class="feature-left">
                                <div class="feature-icon"><img src="./images/adventure.png" alt=""></div>
                                <div class="feature-content">
                                    <h4>Điểm đến đa dạng</h4>
                                    <p>Các tour hấp dẫn, nhiều điểm đến cho bạn lựa chọn.</p>
                                </div>
                            </div>
                            <!-- /.feature-left -->
                            <!-- feature-left -->
                            <div class="feature-left">
                                <div class="feature-icon"><img src="./images/hotel.png" alt=""></div>
                                <div class="feature-content">
                                    <h4>Chỗ ở thoải mái</h4>
                                    <p>Đảm bảo cho bạn chỗ nghỉ ngơi thoải mái trong suốt chuyến đi. </p>
                                </div>
                            </div>
                            <!-- /.feature-left -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.about-section -->
@endsection
@section('title')Trang chủ
@endsection

