@extends('shop.layouts.shop-master')
@section('main-content')
    <!-- Page Title
		============================================= -->
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             style="background-image: url({{asset('demos/store/images/men/8.jpg')}}); background-size: cover; padding: 170px 0 100px;"
             data-bottom-top="background-position: 50% 200px;" data-top-bottom="background-position: 50% -200px;">

        <div class="container clearfix">
            <h1>Checkout</h1>
            <span>Check Your Order And Pay</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">


                @if($errors->has('stock_error'))
                <div class="alert alert-danger">
                    <span>{{$errors->first('stock_error')}}</span>
                </div>
                @endif

                <div class="row col-mb-50 gutter-50">
                    <div class="col-lg-4">
                        <h3>Your Orders</h3>

                        <div class="table-responsive">
                            <table class="table cart">
                                <thead>
                                <tr>
                                    <th class="cart-product-thumbnail">&nbsp;</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-quantity">Quantity</th>
                                    <th class="cart-product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::content() as $row)
                                    <tr class="cart_item">
                                        <td class="cart-product-thumbnail">
                                            <a href="#"><img width="64" height="64"
                                                             src="{{$row->model->images->first()->file_name}}"
                                                             alt="Pink Printed Dress"></a>
                                        </td>

                                        <td class="cart-product-name">
                                            <a href="#">{{$row->name}}</a>
                                        </td>

                                        <td class="cart-product-quantity">
                                            <div class="quantity clearfix">
                                                {{$row->qty}}
                                            </div>
                                        </td>

                                        <td class="cart-product-subtotal">
                                            <span class="amount">{{number_format($row->total)}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <h3>Cart Totals</h3>

                        <div class="table-responsive">
                            <table class="table cart">
                                <tbody>
                                <tr class="cart_item">
                                    <td class="border-top-0 cart-product-name">
                                        <strong>Cart Subtotal</strong>
                                    </td>

                                    <td class="border-top-0 cart-product-name">
                                        <span class="amount">{{Cart::total()}}</span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Shipping</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount">Free Delivery</span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Total</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount color lead"><strong>{{Cart::total()}}</strong></span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="accordion clearfix">
                            <div class="accordion-header">
                                <div class="accordion-icon">
                                    <i class="accordion-closed icon-line-minus"></i>
                                    <i class="accordion-open icon-line-check"></i>
                                </div>
                                <div class="accordion-title">
                                    Direct Bank Transfer
                                </div>
                            </div>
                            <div class="accordion-content clearfix">Donec sed odio dui. Nulla vitae elit libero, a
                                pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere
                                erat a ante venenatis dapibus posuere velit aliquet.
                            </div>

                            <div class="accordion-header">
                                <div class="accordion-icon">
                                    <i class="accordion-closed icon-line-minus"></i>
                                    <i class="accordion-open icon-line-check"></i>
                                </div>
                                <div class="accordion-title">
                                    Cheque Payment
                                </div>
                            </div>
                            <div class="accordion-content clearfix">Integer posuere erat a ante venenatis dapibus
                                posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum
                                nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.
                            </div>

                            <div class="accordion-header">
                                <div class="accordion-icon">
                                    <i class="accordion-closed icon-line-minus"></i>
                                    <i class="accordion-open icon-line-check"></i>
                                </div>
                                <div class="accordion-title">
                                    Paypal
                                </div>
                            </div>
                            <div class="accordion-content clearfix">Nullam id dolor id nibh ultricies vehicula ut id
                                elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis,
                                est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur.
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <h3>Shipping Address</h3>

                        <form action="{{route('shop.checkout.place.order')}}" method="POST" id="shipping-form"
                              name="shipping-form" class="row mb-0">
                            @csrf
                            <div class="col-md-6 form-group">
                                <label for="shipping-form-name">First Name:</label>
                                <input type="text" id="shipping-form-name" name="first_name" value=""
                                       class="sm-form-control"/>
                                @if ($errors->has('first_name'))
                                    <h6><span class="error">{{ $errors->first('first_name') }}</span></h6>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="shipping-form-lname">Last Name:</label>
                                <input type="text" id="shipping-form-lname" name="last_name" value=""
                                       class="sm-form-control"/>
                                @if ($errors->has('last_name'))
                                    <h6><span class="error">{{ $errors->first('last_name') }}</span></h6>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="shipping-form-post-code">Post Code:</label>
                                <input type="text" id="shipping-form-post-code" name="post_code" value=""
                                       class="sm-form-control"/>
                                @if ($errors->has('post_code'))
                                    <h6><span class="error">{{ $errors->first('post_code') }}</span></h6>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="shipping-form-phone-number">Phone Number:</label>
                                <input type="text" id="shipping-form-phone-number" name="phone_number" value=""
                                       class="sm-form-control"/>
                                @if ($errors->has('phone_number'))
                                    <h6><span class="error">{{ $errors->first('phone_number') }}</span></h6>
                                @endif
                            </div>

                            <div class="col-12 form-group">
                                <label for="shipping-form-address">Address:</label>
                                <input type="text" id="shipping-form-address" name="address" value=""
                                       class="sm-form-control"/>
                                @if ($errors->has('address'))
                                    <h6><span class="error">{{ $errors->first('address') }}</span></h6>
                                @endif
                            </div>

                            <div class="col-12 form-group">
                                <label for="shipping-form-message">Notes <small>*</small></label>
                                <textarea class="sm-form-control" id="shipping-form-message" name="notes" rows="4"
                                          cols="30"></textarea>
                            </div>

                            <div class="row justify-content-end">
                                <div class="align-items-end">
                                    <button type="submit" class="button button-dark mt-5 float-end"> Place Order <i
                                            class="icon-line-arrow-right"></i></button>
                                    <a href="{{route('shop.shopping-cart.show')}}"
                                       class="button button-dark mt-5 float-end"><i class="icon-line-arrow-left"></i>Edit
                                        Cart </a>
                                </div>
                            </div>

                        </form>

                    </div>

                    <div class="w-100"></div>

                </div>
            </div>
        </div>
    </section><!-- #content end -->

@endsection
