<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Nemotourist - @yield('title')</title>
    <link rel="shortcut icon" href="images/nemo.ico">
    <base href="{{asset('')}}">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
    <!-- owl-carousel -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.css" rel="stylesheet">
    <!-- jquery ui  -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <!-- FontAwesome CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- header-section-->
        @include('layout.header')
        <!-- /. header-section-->
        @yield('content')
        <!-- footer -->
        @include('layout.footer')
        <!-- /.footer -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="search" method="get" style="text-align: center;">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="search-form">
                                <input type="text" name="key" class="form-control" placeholder="Nhập tour bạn muốn tìm kiếm...">
                                <button type="submit" class="btn btn-default">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Modal -->
        <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/menumaker.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/sticky-header.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/multiple-carousel.js"></script>
        <script src="js/jquery-ui.js"></script>
        {{-- <script src="js/date.js"></script> --}}
        <script src="js/return-to-top.js"></script>
    </div>
    @yield('script')
</body>
</html>