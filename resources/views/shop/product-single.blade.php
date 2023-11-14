@extends('shop.layouts.shop-master')
@section('main-content')
    <!-- Page Title
		============================================= -->
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             style="background-image: url({{asset('demos/store/images/men/8.jpg')}}); background-size: cover; padding: 170px 0 100px;"
             data-bottom-top="background-position: 50% 200px;" data-top-bottom="background-position: 50% -200px;">

        <div class="container clearfix">
            <h1>Product Details</h1>
            <span>check details and add to cart</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="content">
        <div class="content-wrap pb-0">
            <div class="clear"></div>

            <div class="single-product mb-6">
                <div class="product">
                    <div class="container-fluid">
                        <div class="row gutter-50">
                            <div class="col-xl-7 col-lg-5 mb-0 sticky-sidebar-wrap">
                                <div class="masonry-thumbs grid-container grid-2" data-lightbox="gallery">
                                    @foreach($product->images as $image)
                                        <a class="grid-item" data-lightbox="gallery-item"><img
                                                src="{{$image->file_name}}" alt="product image"></a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-7 mb-0">

                                <div class="row mt-3">
                                    <div class="title-center">
                                        <h2>{{$product->title}}</h2>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="product-price">
                                        <h3> Price : <span>{{number_format($product->price) }} Toman</span></h3>
                                    </div>
                                </div>
                                <div class="product-stock mt-0">
                                    <h3>Stock : <span>{{$product->stock > 0 ? $product->stock : "out of stock"}}</span></h3>
                                </div>

                                <div class="line line-sm"></div>

                                <!-- Product Single - Quantity & Cart Button
                                ============================================= -->
                                <div class="text-center">
                                    <button class="button button-dark button-light add_button"
                                            id="add_button" data-id="{{$product->id}}" {{$product->stock==0 ? 'disabled' : ''}}>
                                        <i class="icon-line-plus"></i>Add to Cart
                                    </button>
                                </div>

                                <div class="line line-sm"></div>

                                <div>

                                    <!-- Product Single - Short Description
                                    ============================================= -->
                                    <p>{{$product->description}}</p>

                                    <div class="line line-sm"></div>

                                    <ul class="iconlist mb-0">
                                        <li><i class="icon-caret-right"></i> Best Quality</li>
                                        <li><i class="icon-caret-right"></i> Shipping Options</li>
                                        <li><i class="icon-caret-right"></i> 30-Day Return Policy</li>
                                    </ul><!-- Product Single - Short Description End -->

                                </div>

                                <!-- Product Single - Meta
                                ============================================= -->
                                <div class="card product-meta mt-4 mb-5 rounded-0">
                                    <div class="card-body">

                                        <span itemprop="productID" class="sku_wrapper">SKU:
                                            <span class="sku">8465415</span></span>

                                        <span class="posted_in">Category:
                                            <a href="{{route('shop.products.index', ['cate[]'=>$product->category->id])}}"
                                               rel="tag">{{$product->category->name}}</a></span>

{{--                                        <span class="tagged_as">Tags:--}}
{{--                                            <a href="#" rel="tag">Pink</a>,--}}
{{--                                            <a href="#" rel="tag">Short</a>,--}}
{{--                                            <a href="#" rel="tag">Dress</a>,--}}
{{--                                            <a href="#" rel="tag">Printed</a>.</span>--}}

                                    </div>
                                </div><!-- Product Single - Meta End -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="section mb-0">

                <div class="container mw-md text-center">
                    <h4>Similar Products</h4>

                    <div class="row justify-content-center gutter-1">

                        <!-- Shop Item 1
                        ============================================= -->
                        @foreach($products as $product)
                            <div class="col-md-3 col-6 h-translate-y-sm all-ts">
                                <div class="product bg-white">
                                    <div class="product-image position-relative">
                                        <div class="fslider" data-pagi="false" data-speed="400" data-pause="10000">
                                            <div class="flexslider">
                                                <div class="slider-wrap">
                                                    @foreach($product->images as $image)
                                                        <div class="slide">
                                                            <a href="{{route('shop.products.show', $product->id)}}"><img
                                                                    src="{{$image->file_name}}"
                                                                    alt="product image"></a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="button button-dark button-light add_button"
                                                    id="add_button" data-id="{{$product->id}}" {{$product->stock==0 ? 'disabled' : ''}}>
                                                <i class="icon-line-plus"></i>Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                    <div class="product-desc flex-column px-4">
                                        <div class="product-title">
                                            <h3><a href="{{route('shop.products.show', $product->id)}}">{{$product->title}}</a></h3>
                                            <span><a href="#"></a>{{$product->category->name}}</span>
                                        </div>
                                        <div class="product-price">
                                            <ins>{{number_format($product->price) }} Toman</ins>
                                        </div>
                                        <hr>
                                        <h5>Stock :   <span>{{$product->stock > 0 ? $product->stock : "out of stock"}}</span></h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

            <div class="section bg-transparent my-3">
                <div class="container-fluid">
                    <div class="row justify-content-center m-auto" style="max-width: 1000px;">
                        <div class="col-md-7">
                            <p class="h6 mb-0 text-muted">Conveniently network effective total linkage via intermandated
                                opportunities. Distinctively <a
                                    href="mailto:noreply@canvas.com"><u>noreply@canvas.com</u></a> premium products.</p>
                        </div>
                        <div class="col-md-5 mt-3 mt-md-0">
                            <h2 class="h1 fw-bold ls--1 color"><a href="tel:09876543211">(+0) 9876 543210</a></h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('script')

    <script>
        (function () {
            $('.add_button').click(function (e) {
                var $addBtn = $(this);
                var id = $addBtn.data('id');
                var qty = 1;
                var container = $('#shopping-cart-mini');
                $.ajax({
                    type: "POST",
                    url: "/shop/shopping-cart/add/",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        product_id: id,
                        qty: qty,
                    },
                    success: function (data) {
                        message = data.message;
                        console.log(message)
                        view = data.view;
                        container.replaceWith(view)
                        bindEvents();
                    }
                });
                return false;
            });
        })();
    </script>

@endsection

