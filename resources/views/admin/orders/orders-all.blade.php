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
                            <h4 class="page-title">Orders List</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                    <li class="breadcrumb-item active">Orders</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-lg-8">
                                        <form class="d-flex flex-wrap align-items-center">
                                            <div class="d-flex flex-wrap align-items-center mb-2">
                                                <label for="inputPassword2" class="visually-hidden">Search</label>
                                                <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center mx-sm-3 mb-2">
                                                <label for="status-select" class="me-2">Status</label>
                                                <div>
                                                    <select class="form-select " id="status-select">
                                                        <option selected>Choose...</option>
                                                        @foreach($statuses as $key => $status)
                                                        <option value="{{$key}}">{{$status}}</option>
                                                        @endforeach
                                                        <option value="">all</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end row -->


                                @if(Session::has('store-message'))
                                    <div class="alert alert-success">{{Session::get('store-message')}}</div>
                                @elseif(Session::has('update-message'))
                                    <div class="alert alert-success">{{Session::get('update-message')}}</div>
                                @elseif(Session::has('destroy-message'))
                                    <div class="alert alert-danger">{{Session::get('destroy-message')}}</div>
                                @endif


                                <div class="table-responsive">
                                    <table class="align-items-center table table-centered w-100 dt-responsive nowrap" id="orders-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="table-light">
                                        <tr class="text-center">
                                            <th class="all" style="width: 20px;">
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="orderlistCheck">
                                                    <label class="form-check-label" for="orderlistCheck">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th class="all">order Num</th>
                                            <th>User Id</th>
                                            <th>Item Count</th>
                                            <th>Total</th>
                                            <th>Payment Status</th>
                                            <th>Order Status</th>
                                            <th>Date</th>
                                            <th style="width: 125px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr class="text-center">
                                                <td>
                                                    <div class="form-check font-16 mb-0">
                                                        <input class="form-check-input" type="checkbox" id="orderlistCheck1">
                                                        <label class="form-check-label" for="orderlistCheck1">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="m-0 d-inline-block align-middle">
                                                        <a href="{{route('orders.show', $order->id)}}" class="text-dark">{{$order->order_number}}</a></h5>
                                                </td>
                                                <td>
                                                    <a href="{{route('users.show', $order->user->id)}}">{{$order->user_id}}</a>
                                                </td>
                                                <td>
                                                    {{$order->item_count}}
                                                </td>
                                                <td>
                                                    {{number_format($order->grand_total)}}
                                                </td>
                                                <td>
                                                    {{$order->payment_status}}
                                                </td>
                                                <td>
                                                    {{ trans('order_statuses.' . $order->status) }}
                                                </td>
                                                <td>
                                                    {{$order->created_at}}
                                                </td>
                                                <td>
                                                    <ul class="list-inline table-action m-0">
                                                        <li class="list-inline-item">
                                                            <a href="{{route('orders.show', $order->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <form action="{{route('orders.destroy', $order->id)}}" class="mb-0" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" style="background-color: transparent ;border:none" class="action-icon"><i class="mdi mdi-delete"></i></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2">
                                    {{$orders->links()}}
                                </div>
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
@section('scripts')
    <script>
        $(document).ready(function () {
            // Listen for changes in the select box
            $('#status-select').on('change', function () {
                var status = $(this).val();

                // Check if a value is selected
                    // Make an AJAX request to retrieve dynamic content
                    window.location.href = "{{route('orders.index')}}"+"?status="+status;

            });
        });
    </script>

@endsection
