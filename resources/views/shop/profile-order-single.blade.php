@extends('shop.layouts.shop-master')
@section('main-content')
    <!-- Page Title
		============================================= -->
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             style="background-image: url({{asset('demos/store/images/men/8.jpg')}}); background-size: cover; padding: 170px 0 100px;"
             data-bottom-top="background-position: 50% 200px;" data-top-bottom="background-position: 50% -200px;">

        <div class="container clearfix">
            <h1>User Order</h1>
            <span>Check Your Order</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Order</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row col-lg-12">
                    <div>
                        <h3>Order Number: <p>{{$order->order_number}}</p></h3>
                    </div>
                    <div class="col-md-5">
                        <h3 class="mb-2">Order Items</h3>
                        <table class="table table-striped text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->product->title}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{number_format($item->product->price)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-7">
                        <h3 class="mb-5">Order Details</h3>
                        <table class="table table-striped text-center">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Total</th>
                                <th>Shipping Cost</th>
                                <th>Shipping Name</th>
                                <th>Reference Id</th>
                                <th>Order Status</th>
                                <th>Cancel Order</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{number_format($order->grand_total)}}</td>
                                <td>Free</td>
                                <td>{{$order->first_name}}</td>
                                <td>{{$order->transaction->reference_id}}</td>
                                <td>{{ trans('order_statuses.' . $order->status) }}</td>
                                <td>
                                    <ul class="list-inline table-action m-0">
                                        <li class="list-inline-item">
                                            <form action="{{route('orders.update.status' , $order->id)}}" class="mb-0" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        style="background-color: transparent ;border:none"
                                                        class="action-icon"><i class="icon-line-square-cross"></i>
                                                    <input type="hidden" name="status" value="3">
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
