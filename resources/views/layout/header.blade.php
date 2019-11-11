	<!-- header-section-->
        <div class="header-wrapper">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-8 d-none d-xl-block d-sm-block">
                            <div class="top-header-content">
                                <ul class="list-none">
                                    <li><i class="fa fa-envelope top-header-icon"></i> ou@ou.edu.vn</li>
                                    <li><i class="fa fa-phone top-header-icon"></i> (028) 3930 0210</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-3 col-sm-6 col-8 d-none d-block d-sm-block">
                            <div class="top-header-content">
                                <ul class="list-none">
                                @if(Auth::check())
                                    <li><a href="{{route('user')}}"> Chào {{Auth::user()->name}} !!!</a></li>
                                    <li><a href="{{route('logout')}}"> Đăng xuất</a></li>
                                @else
                                    <li><a href="{{route('login')}}"> Đăng nhập</a></li>
                                    <li><a href="{{route('signup')}}"> Đăng ký</a></li>
                                @endif
                                </ul>
                            </div>
                        </div>
                        <div class=" col-xl-1 col-lg-1 col-md-1 col-sm-1 col-4">
                            <a href="#" class="search-icon" data-toggle="modal" data-target="#exampleModal">
                           <i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-section-->
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 col-md-3 col-sm-3 col-12">
                            <div class="logo"> <a href="index.html"><img src="./images/rnemologo.png" alt=""> </a> </div>
                        </div>
                        <div class="col-xl-9 col-lg-10 col-md-9 col-sm-12 col-12">
                            <!-- navigations-->
                            <div class="navigation">
                                <div id="navigation">
                                    <ul>
                                        <li class="active"><a href="{{route('home')}}">Trang chủ</a></li>
                                        <li class="has-sub"><a>Tour</a>
                                            <ul>
                                                @foreach($tourcategory as $tc)
                                                <li><a href="{{route('tour-category',$tc->id)}}">{{$tc->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{route('hotel')}}">Khách sạn</a></li>
                                        <li><a href="{{route('transport')}}">Thuê xe</a></li>
                                        <li><a href="{{route('contact')}}">Liên hệ</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.navigations-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /. header-section-->