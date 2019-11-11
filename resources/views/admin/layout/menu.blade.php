<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Tìm kiếm...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="admin/bookingstatus/list"><i class="fa fa-cube fa-fw"></i>Trạng thái đơn hàng<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/customer/list"><i class="fa fa-cube fa-fw"></i>Khách hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/customer/list">Danh sách khách hàng</a>
                                </li>
                                <li>
                                    <a href="admin/customer/add">Thêm khách hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/tourcategory/list"><i class="fa fa-cube fa-fw"></i>Loại tour<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/tourcategory/list">Danh sách loại tour</a>
                                </li>
                                <li>
                                    <a href="admin/tourcategory/add">Thêm loại tour</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/tour/list"><i class="fa fa-cube fa-fw"></i>Tour<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('tour-table.index')}}">Danh sách các tour</a>
                                </li>
                                <li>
                                    <a href="admin/tour/add">Thêm tour</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/tourdetail/list"><i class="fa fa-cube fa-fw"></i>Thông tin tour<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/tourdetail/list">Danh sách tour detail</a>
                                </li>
                                <li>
                                    <a href="admin/tourdetail/add">Thêm tour detail</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/tourbooking/list"><i class="fa fa-cube fa-fw"></i>Danh sách đặt tour<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/hotel/list"><i class="fa fa-cube fa-fw"></i>Khách sạn<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/hotel/list">Danh sách khách sạn</a>
                                </li>
                                <li>
                                    <a href="admin/hotel/add">Thêm khách sạn</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/hotelbooking/list"><i class="fa fa-cube fa-fw"></i>Danh sách đặt khách sạn<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/transport/list"><i class="fa fa-cube fa-fw"></i>Thuê xe<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/transport/list">Danh sách các gói thuê xe</a>
                                </li>
                                <li>
                                    <a href="admin/transport/add">Thêm gói thuê xe</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/transportbooking/list"><i class="fa fa-cube fa-fw"></i>Danh sách đặt xe<span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admin/user/list"><i class="fa fa-users fa-fw"></i>Người dùng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/user/list">Danh sách người dùng</a>
                                </li>
                                <li>
                                    <a href="admin/user/add">Thêm người dùng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
</div>