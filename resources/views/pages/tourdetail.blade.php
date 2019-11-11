@extends('layout.index')
@section('content')
<!-- page-header -->
        <div class="tour-pageheader" style="background: url(upload/images/{{$tour->image}}) no-repeat; background-size: 100% 700px; image-rendering: pixelated; background-position: top center; ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="tour-caption">
                            <h1 class="text-white tour-title">{{$tour->name}}</h1>
                            <p class="tour-caption-text text-white"><strong class="tour-rate">Giá từ: {{number_format($tour->price)}} <small>đồng</small></strong></p>
                            <a href="{{route('tour-booking', $tour->id)}}" class="btn btn-primary mb10">Đặt ngay</a>
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
                                {{$tourdetail->about}}
                                <li>Đi từ: {{$tourdetail->tours->go_from}}</li>
                                <li>Đi đến: {{$tourdetail->tours->go_to}}</li>
                            </ul>
                            <h4 class="mb30">{{$tourdetail->tours->name}}</h4>
                            <div class="slide-thumb-gallery">
                                <img class="img-fluid" src="upload/images/{{$tourdetail->image}}">
                            </div>
                        </div>
                        <div class="journey-section mb60">
                            <div class="well-bg-block">
                                <h4 class="journey-day-title">Nội dung chuyến đi</h4>
                                <ul class="angle list-none">
                                    @foreach(explode('/n', $tourdetail->content) as $td)
                                        <p>{{$td}}</p>
                                    @endforeach
                                </ul>
                            </div> 
                        </div>
                        <div class="included-section mb60">
                            <div class="well-bg-block">
                                <h3 class="journey-day-title">Tour bao gồm</h3>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <ul class="arrow list-none">
                                            <li>Chi phí khách sạn, ăn uống</li>
                                            <li>Vé máy bay lưu thông, xe đưa đón</li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <ul class="arrow list-none">
                                            <li>Quà tặng: Balo, nón, áo, ví đựng passport</li>
                                            <li>Hướng dẫn viên chuyên nghiệp</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="included-section mb60">
                            <div class="well-bg-block">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Khách sạn</label>
                                            <select class="form-control" id="name" name="namehotel">
                                                    <option value="0" disabled="true" selected="true">Vui lòng chọn khách sạn</option>
                                                @foreach($hotelhere as $hh)
                                                    <option value="{{$hh->id}}" data-divid="upload/images/hotel/{{$hh->image}}">{{$hh->name}}. Đánh giá: {{$hh->star_rating}} sao</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <img src="images/tour_img_4.jpg" class="image-swap" height="200px" width="300px">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Giá tiền (VNĐ)</label>
                                            <input id="price" name="price" type="text" placeholder="Giá tiền khách sạn" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input id="address" name="address" type="text" placeholder="Địa chỉ" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--comments start-->
                        <div class="comment-area">
                            <div class="fb-comments ml-5" data-href="http://localhost:8080/MyLaravel/public/tour-detail/{{$tourdetail->tours->id}}" data-width="500" data-numposts="5"></div>
                        </div>
                        <div class="fb-like" data-href="http://localhost:8080/MyLaravel/public/hotel-detail/{{$tourdetail->tours->id}}" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
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
<div class="bg-light similar-package">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-title">
                        <h2>Tour nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($tourhighlight as $th)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- destination-section -->
                   <div class="destination-block">
                            <div class="desti-img">
                                <img src="upload/images/{{$th->image}}" height="360px" alt="">
                                <a href="#" class="desti-title">{{$th->name}}</a>
                                <div class="overlay">
                                </div>
                                <div class="text">
                                    <ul class="angle list-none">
                                        <li>{{$th->about}}</li>
                                    </ul>
                                    <p class="price">{{number_format($th->price)}} <small>đồng</small></p>
                                    <a href="{{route('tour-detail', $th->id)}}" class="btn-link">Xem ngay <i class="fa fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    <!-- /.destination-section -->
                </div>
                @endforeach
            </div>
            <div class="row">{{$tourhighlight->links()}}</div>
        </div>
    </div>
@endsection
@section('title'){{$tour->name}}
@endsection
@section('script')
    <script>
    $(document).ready(function(){

        $("#name").change(function() {
            var hotel_id=$(this).val();
            imgsrc = $(this).children("option:selected").attr("data-divid");
            console.log(hotel_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('hotelhere')!!}',
                data:{'id':hotel_id},
                success:function(data){
                    console.log(data);
                    $('.image-swap').attr("src", imgsrc);
                    $("#price").val(data.price);
                    $("#address").val(data.address);
                },
                error:function(){
                }
            });
        });
    });
    </script>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=2617343875017349&autoLogAppEvents=1"></script>
@endsection