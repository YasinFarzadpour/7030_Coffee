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

                @if($status)
                <h4>Complete Payment</h4>
                <div class="alert alert-success" role="alert">
                    <h3 class="alert-heading mb-3">Well done!</h3>
                    <p class="mb-0">Your Reference Id: {{$reference_id}}</p>
                    <hr>
                    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and
                        tidy.</p>
                </div>
                @else

                <div class="alert alert-dismissible alert-danger mb-0">
                    <i class="icon-remove-sign"></i><strong>Oh snap!</strong> {{$error_message}}
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-hidden="true"></button>
                </div>
                @endif

            </div>
        </div>
    </section>>

@endsection
