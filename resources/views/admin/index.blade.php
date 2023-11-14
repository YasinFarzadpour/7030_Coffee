@extends('admin.layouts.admin-master')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box page-title-box-alt">
                            <h4 class="page-title">Welcome !</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Sales</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="widget-simple text-center card">
                            <div class="card-body">
                                <h1 class="text-primary mt-0 mb-2"><span data-plugin="counterup">{{$totalOrders}}</span></h1>
                                <h3 class="text-muted mb-0">Total Orders</h3>
                                <hr>

                                <ul class="list-inline">
                                    <li class="list-inline-item d-flex justify-content-between align-items-center mb-2">
                                        Pending Orders
                                        <span class="badge bg-warning rounded-pill">{{$pendingOrders}}</span>
                                    </li>
                                    <li class="list-inline-item d-flex justify-content-between align-items-center mb-2">
                                        Processing Orders
                                        <span class="badge bg-primary rounded-pill">{{$processingOrders}}</span>
                                    </li>
                                    <li class="list-inline-item d-flex justify-content-between align-items-center mb-2">
                                        Completed Orders
                                        <span class="badge bg-success rounded-pill">{{$completedOrders}}</span>
                                    </li>
                                    <li class="list-inline-item d-flex justify-content-between align-items-center mb-2">
                                        Declined Orders
                                        <span class="badge bg-danger rounded-pill">{{$declinedOrders}}</span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="widget-simple text-center card">
                            <div class="card-body">
                                <h1 class="text-success mt-0 mb-2"><span data-plugin="counterup">{{number_format($totalRevenue)}}</span></h1>
                                <h3 class="text-muted mb-0">Total Revenue</h3>
                                <hr>

                                <ul class="list-inline">
                                    <li class="list-inline-item d-flex justify-content-between align-items-center mb-2">
                                        Today Revenue
                                        <span class="price-unit">{{number_format($todayRevenue)}}</span>
                                    </li>
                                    <li class="list-inline-item d-flex justify-content-between align-items-center mb-2">
                                        This Week Revenue
                                        <span class="list-group-numbered">{{number_format($weekRevenue)}}</span>
                                    </li>
                                    <li class="list-inline-item d-flex justify-content-between align-items-center mb-2">
                                        This Month Revenue
                                        <span class="list-group-numbered">{{number_format($monthRevenue)}}</span>
                                    </li>
                                    <li class="list-inline-item d-flex justify-content-between align-items-center mb-2">
                                        This Year Revenue
                                        <span class="list-group-numbered">{{number_format($yearRevenue)}}</span>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> &copy; Minton theme by <a href="">Coderthemes</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>
@endsection
