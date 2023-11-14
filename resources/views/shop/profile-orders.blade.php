@extends('shop.layouts.shop-master')
@section('main-content')
    <!-- Page Title
		============================================= -->
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             style="background-image: url({{asset('demos/store/images/men/8.jpg')}}); background-size: cover; padding: 170px 0 100px;"
             data-bottom-top="background-position: 50% 200px;" data-top-bottom="background-position: 50% -200px;">

        <div class="container clearfix">
            <h1>User Orders</h1>
            <span>Track Your Orders</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Orders</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row gutter-40 col-mb-80">
                    <table class="table table-striped col-md-9 mb-5">
                        <h3 class="mb-2">Your Orders</h3>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>order Num</th>
                            <th>Item Count</th>
                            <th>Total</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td><a href="{{route('shop.profile.order', $order->id)}}">{{$order->order_number}}</a></td>
                            <td>{{$order->item_count}}</td>
                            <td>{{number_format($order->grand_total)}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{ trans('order_statuses.' . $order->status) }}</td>
                            <td>{{$order->created_at}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
