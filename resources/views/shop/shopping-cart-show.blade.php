@extends('shop.layouts.shop-master')
@section('main-content')
    <!-- Page Title
		============================================= -->
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             style="background-image: url({{asset('demos/store/images/men/8.jpg')}}); background-size: cover; padding: 170px 0 100px;"
             data-bottom-top="background-position: 50% 200px;" data-top-bottom="background-position: 50% -200px;">

        <div class="container clearfix">
            <h1>Shopping Cart</h1>
            <span>Edit Your Cart Or Proceed To Checkout</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping-Cart</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <form action="{{route('shop.shopping-cart.update')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <table class="table cart mb-5 align-items-center border-dark">
                        <thead>
                        <tr class="text-center">
                            <th class="cart-product-remove">Remove</th>
                            <th class="cart-product-thumbnail">Image</th>
                            <th class="cart-product-name">Product</th>
                            <th class="cart-product-price">Unit Price</th>
                            <th class="cart-product-stock">Stock</th>
                            <th class="cart-product-quantity">Quantity</th>
                            <th class="cart-product-subtotal">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Cart::content() as $row)
                            <tr class="text-center cart_item" id="{{$row->rowId}}">
                                <td class="cart-product-remove">
                                    <i type="button" class="icon-remove-sign" data-id="{{$row->rowId}}"></i>
                                </td>

                                <td class="cart-product-thumbnail">
                                    <img style="height: 100px; width: 125px"
                                         src="{{$row->model->images->first()->file_name}}"
                                         alt="Product Image">
                                </td>

                                <td class="cart-product-name">
                                    <a href="{{route('shop.products.show', $row->model->id)}}">{{$row->name}}</a>
                                </td>

                                <td class="cart-product-price">
                                    <span class="amount">{{number_format($row->price)}}</span>
                                </td>

                                <td class="cart-product-stock">
                                    <span class="amount">{{$row->model->stock}}</span>
                                </td>

                                <td class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="{{"update_cart[".$row->rowId."][qty]"}}" value="{{$row->qty}}" class="qty"/>
                                        <input type="button" value="+" class="plus">
                                        <input type="hidden" name="{{"update_cart[".$row->rowId."][row_id]"}}" value="{{$row->rowId}}" >
                                    </div>
                                </td>

                                <td class="cart-product-subtotal">
                                    <span class="amount">{{number_format($row->total)}}</span>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="cart_item">
                            <td colspan="9">
                                <div class="row justify-content-lg-between py-3 col-mb-20">
                                    <div class="col-lg-auto ps-lg-5 mt-2">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3>Cart Totals : </h3>
                                            </div>
                                            <div class="col-md-2 mt-3 mt-md-0">
                                                <h3 id="total">{{Cart::total()}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto pe-lg-5">
                                        <button type="submit"
                                                class="button button-dark mt-2 mt-sm-0 me-0">Update Cart</button>
                                        <a href="{{route('shop.checkout.show')}}"
                                                class="button button-dark mt-2 mt-sm-0 me-0">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section><!-- #content end -->


@endsection
@section('script')
    <script>

        (function() {
            $('.icon-remove-sign').click(function (e) {

                var $removeBtn = $(this);
                var id = $removeBtn.data('id');
                var container = $('#shopping-cart-mini');

                $.ajax({
                    type: "DELETE",
                    url: "/shop/shopping-cart/remove/" + id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        $('#' + id).fadeOut('slow', function(){ $('#' + id).remove(); });
                        totalPrice = data.cartTotal;
                        $('#total').text(totalPrice)
                        view = data.view;
                        container.replaceWith(view)
                        bindEvents();

                        message = data.message;
                        console.log(message)
                    }
                });
                return false;
            });
        })();

    </script>
@endsection
