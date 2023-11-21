<div>
    <div class="content-wrap">
        <div class="container clearfix">
            <div>
                <h2>Dear, {{$order->user->name}}</h2>
                <h3>Your Order Placed. Your Payment Process is done.</h3>
            </div>
            <div class="row col-lg-12 table-bordered">
                <div>
                    <h4>Order Number: <span>{{$order->order_number}}</span></h4>
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
                    <h3 class="mb-2">Order Details</h3>
                    <table class="table table-striped text-center">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Total</th>
                            <th>Shipping Cost</th>
                            <th>Shipping Name</th>
                            <th>Reference Id</th>
                            <th>Order Status</th>
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
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
