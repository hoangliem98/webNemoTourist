@extends('layout.index')
@section('content')
<!-- page-header -->
        <div class="tour-pageheader" style="background: url(upload/images/transport/{{$transport->image}}) no-repeat; background-size: 100% 700px; image-rendering: pixelated; background-position: top center; ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="tour-caption">
                            <h1 class="text-white tour-title">{{$transport->name}}</h1>
                            <p class="tour-caption-text text-white"><strong class="tour-rate">Giá từ: {{number_format($transport->price)}} <small>đồng</small></strong></p>
                            <a href="transport-booking/{{$transport->id}}" class="btn btn-primary mb10">Đặt ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- /.page-header-->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                        <div class="highlights-section mb60">
                            <ul class="angle list-none title-bold mb40">
                                <h3>Nổi bật</h3>
                                {{$transport->highlight}}
                            </ul>
                            <h4 class="mb30">{{$transport->name}}</h4>
                            <div class="slide-thumb-gallery">
                                <img class="img-fluid" src="upload/images/transport/{{$transport->image}}">
                            </div>
                        </div>
                        <div class="journey-section mb60">
                            <div class="well-bg-block">
                                <ul class="angle list-none">
                                    {{$transport->content}}
                                </ul>
                            </div> 
                        </div>
                        <div class="included-section mb60">
                            <div class="well-bg-block">
                                <h3 class="journey-day-title">Các tiện nghi</h3>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <ul class="arrow list-none">
                                            <li>Xe mới, sạch sẽ</li>
                                            <li>Giao dịch an toàn, nhanh chóng</li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <ul class="arrow list-none">
                                            <li>An toàn và an tâm</li>
                                            <li>Luôn luôn đúng giờ theo yêu cầu của bạn</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--comments start-->
                        <div class="comment-area">
                            <div class="fb-comments ml-5" data-href="http://localhost:8080/MyLaravel/public/transport-detail/{{$transport->id}}" data-width="500" data-numposts="5"></div>
                        </div>
                        <div class="fb-like" data-href="http://localhost:8080/MyLaravel/public/transport-detail/{{$transport->id}}" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                        <div class="widget-primary support-list">
                            <div class="widget-primary-title">
                                <h3>Tại sao nên đến với chúng tôi ?</h3>
                            </div>
                            <ul class="arrow list-none">
                                <li>Hỗ trợ dịch vụ 24/7</li>
                                <li>Giải quyết khiếu nại hợp lý</li>
                                <li>Đội ngũ tận tâm, đáng tin cậy</li>
                                <li>Dịch vụ chuyên nghiệp</li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('title'){{$transport->name}}
@endsection
@section('script')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=2617343875017349&autoLogAppEvents=1"></script>
@endsection