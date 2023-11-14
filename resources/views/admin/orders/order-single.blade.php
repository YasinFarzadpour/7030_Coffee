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
                            <h4 class="page-title">Order Detail</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                    <li class="breadcrumb-item active">Order Detail</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom bg-transparent">
                                <h5 class="header-title mb-0">{{$order->order_number}}</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3">
                                            <div class="d-flex mb-2">
                                                <div class="me-2 align-self-center">
                                                    <i class="ri-hashtag h2 m-0 text-muted"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="mb-1">ID No.</p>
                                                    <h5 class="mt-0">
                                                        {{$order->order_number}}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-3">

                                            <div class="d-flex mb-2">
                                                <div class="me-2 align-self-center">
                                                    <i class="ri-user-2-line h2 m-0 text-muted"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="mb-1">Billing Name</p>
                                                    <h5 class="mt-0">
                                                        {{$order->user->name}}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-3">

                                            <div class="d-flex mb-2">
                                                <div class="me-2 align-self-center">
                                                    <i class="ri-calendar-event-line h2 m-0 text-muted"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="mb-1">Date</p>
                                                    <h5 class="mt-0">
                                                        {{$order->created_at}}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-3">
                                            <form action="{{route('orders.update.status' , $order->id)}}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="d-flex mb-2">
                                                    <div class="me-2 mt-2 align-top">
                                                        <i class="ri-map-pin-time-line h2 m-0 text-muted"></i>
                                                    </div>
                                                    <div class="flex-1">
                                                        <ul class="list-unstyled items-nav sticky-sidebar"
                                                            data-container="#shop">
                                                            <p class="mb-1">Order Status change</p>

                                                            @foreach($statuses as $key => $status)
                                                                <li>
                                                                    <input class="form-check-input mb-1" type="radio"
                                                                           name="status"
                                                                           value="{{$key}}"
                                                                           id="{{$key}}" {{ ($key == $order->status) ? 'checked' : ''}}>
                                                                    <label class="form-check-label font-bold"
                                                                           for="{{$key}}">
                                                                        {{$status}}
                                                                    </label>
                                                                </li>
                                                            @endforeach
                                                            <div>
                                                                <button type="submit"
                                                                        class="btn btn-outline-dark btn-sm mt-2">
                                                                    Apply
                                                                </button>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <h4 class="header-title mb-3">Order Items :</h4>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div>
                                                <div class="table-responsive">
                                                    <table class="table table-centered border table-nowrap mb-lg-0">
                                                        <thead class="bg-light">
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($order->items as $item)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="me-3">
                                                                            <img
                                                                                src="{{$item->product->images->first()->file_name}}"
                                                                                alt="product-img" height="40">
                                                                        </div>
                                                                        <div class="flex-1">
                                                                            <h5 class="m-0">{{$item->product->title}}</h5>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{$item->quantity}}</td>
                                                                <td>{{number_format($item->product->price)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div>

                                                <div class="table-responsive">
                                                    <table class="table table-centered border mb-0">
                                                        <thead class="bg-light">
                                                        <tr>
                                                            <th colspan="2">Order summary</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <th scope="row">Total :</th>
                                                            <td>{{number_format($order->grand_total)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Shipping Charge :</th>
                                                            <td>Free</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Total :</th>
                                                            <td>{{number_format($order->grand_total)}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card -->

                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div>
                                    <h4 class="font-15 mb-2">Shipping Information</h4>

                                    <div class="card p-2 mb-lg-0">

                                        <table class="table table-borderless table-sm mb-0">

                                            <tbody>
                                            <tr>
                                                <th scope="row">Name:</th>
                                                <td>{{$order->first_name}} {{$order->last_name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Address:</th>
                                                <td>{{$order->address}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Post Code :</th>
                                                <td>{{$order->post_code}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone Num :</th>
                                                <td>{{$order->phone_number}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <h4 class="font-15 mb-2">Billing Information</h4>

                                    <div class="card p-2 mb-lg-0">
                                        <table class="table table-borderless table-sm mb-0">

                                            <tbody>
                                            <tr>
                                                <th scope="row">Payment Status:</th>
                                                <td>{{$order->payment_status}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Payment Method:</th>
                                                <td>{{$order->payment_method}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Reference Id :</th>
                                                <td>{{$order->transaction->reference_id}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">CVV :</th>
                                                <td>xxx</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div>
                                    <h4 class="font-15 mb-2">Delivery Info</h4>

                                    <div class="card p-2 mb-lg-0">
                                        <div class="text-center">
                                            <div class="my-2">
                                                <i class="mdi mdi-truck-fast h1 text-muted"></i>
                                            </div>
                                            <h5><b>UPS Delivery</b></h5>
                                            <div class="mt-2 pt-1">
                                                <p class="mb-1"><span class="fw-semibold">Order ID :</span> xxxx048</p>
                                                <p class="mb-0"><span class="fw-semibold">Payment Mode :</span> COD</p>
                                            </div>
                                        </div>
                                    </div>
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
