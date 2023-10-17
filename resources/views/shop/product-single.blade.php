@extends('shop.layouts.shop-master')
@section('main-content')
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
                                        <a class="grid-item" data-lightbox="gallery-item"><img src="{{$image->file_name}}" alt="product image"></a>
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


                                    <!-- Product Single - Price
                                    ============================================= -->
                                    <div class="product-price"><ins>{{number_format($product->price) }} Toman</ins></div>
                                    <!-- Product Single - Price End -->

                                    <!-- Product Single - Rating
                                    ============================================= -->
                                    <div class="product-rating">
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star-half-full"></i>
                                        <i class="icon-star-empty"></i>
                                    </div><!-- Product Single - Rating End -->

                                </div>

                                <div class="line line-sm"></div>

                                <!-- Product Single - Quantity & Cart Button
                                ============================================= -->
                                <form class="cart mb-0 d-flex justify-content-between align-items-center" method="post"
                                      enctype='multipart/form-data'>
                                    <div class="quantity clearfix">
                                        <input type="button" value="-" class="minus">
                                        <input type="number" step="1" min="1" name="quantity" value="1" title="Qty"
                                               class="qty"/>
                                        <input type="button" value="+" class="plus">
                                    </div>
                                    <button type="submit" class="add-to-cart button button-large m-0">Add to cart
                                    </button>
                                </form><!-- Product Single - Quantity & Cart Button End -->

                                <div class="line line-sm"></div>

                                <div data-readmore="true" data-readmore-size="250px"
                                     data-readmore-trigger-open="Read More <i class='icon-angle-down'></i>"
                                     data-readmore-trigger-close="false">

                                    <h3>One Size</h3>

                                    <!-- Product Single - Short Description
                                    ============================================= -->
                                    <p>{{$product->description}}</p>

                                    <ul class="iconlist mb-0">
                                        <li><i class="icon-caret-right"></i> Best Quality</li>
                                        <li><i class="icon-caret-right"></i> Shipping Options</li>
                                        <li><i class="icon-caret-right"></i> 30-Day Return Policy</li>
                                    </ul><!-- Product Single - Short Description End -->

                                    <a href="#" class="btn btn-dark btn-sm read-more-trigger"></a>
                                </div>

                                <!-- Product Single - Meta
                                ============================================= -->
                                <div class="card product-meta mt-4 mb-5 rounded-0">
                                    <div class="card-body">
                                        <span itemprop="productID" class="sku_wrapper">SKU: <span
                                                class="sku">8465415</span></span>
                                        <span class="posted_in">Category: <a href="{{route('shop.categories.show', $category->id)}})}}" rel="tag">{{$product->category->name}}</a></span>
                                        <span class="tagged_as">Tags: <a href="#" rel="tag">Pink</a>, <a href="#"
                                                                                                         rel="tag">Short</a>, <a
                                                href="#" rel="tag">Dress</a>, <a href="#" rel="tag">Printed</a>.</span>
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
                                    <a href="#" class="cart-btn button button-white button-light"><i
                                            class="icon-line-plus"></i>Add to Cart</a>
                                </div>
                                <div class="product-desc flex-column px-4">
                                    <div class="product-title">
                                        <h3><a href="demo-store-product-single.html">{{$product->title}}</a></h3>
                                        <span><a href="#"></a>{{$product->category->name}}</span>
                                    </div>
                                    <div class="product-price">
                                        <ins>{{number_format($product->price) }} Toman</ins>
                                    </div>
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

