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
                                    <a class="grid-item" href="demos/store/images/men/items/1.jpg"
                                       data-lightbox="gallery-item"><img src="{{$product->image}}" alt="Watch 1"></a>
                                    <a class="grid-item" href="demos/store/images/men/items/1-3.jpg"
                                       data-lightbox="gallery-item"><img src="{{$product->image}}" alt="Watch 3"></a>
                                    <a class="grid-item" href="demos/store/images/men/items/1-1.jpg"
                                       data-lightbox="gallery-item"><img src="{{$product->image}}" alt="Watch 2"></a>
                                    <a class="grid-item" href="demos/store/images/men/items/1-2.jpg"
                                       data-lightbox="gallery-item"><img src="{{$product->image}}" alt="Watch 4"></a>
                                </div>

                            </div>

                            <div class="col-xl-5 col-lg-7 mb-0">

                                <div class="d-flex align-items-center justify-content-between">

                                    <!-- Product Single - Price
                                    ============================================= -->
                                    <div class="product-price">{{$product->price}}</div>
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
                                        <li><i class="icon-caret-right"></i> Dynamic Color Options</li>
                                        <li><i class="icon-caret-right"></i> Lots of Size Options</li>
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
                                        <span class="posted_in">Category: <a href="#" rel="tag">Dress</a>.</span>
                                        <span class="tagged_as">Tags: <a href="#" rel="tag">Pink</a>, <a href="#"
                                                                                                         rel="tag">Short</a>, <a
                                                href="#" rel="tag">Dress</a>, <a href="#" rel="tag">Printed</a>.</span>
                                    </div>
                                </div><!-- Product Single - Meta End -->

                                <div>
                                    <h4>Product Details</h4>
                                    <table class="table table-striped table-bordered mb-5">
                                        <tbody>
                                        <tr>
                                            <th width="150">Item</th>
                                            <th>Description</th>
                                        </tr>
                                        <tr>
                                            <td>Display</td>
                                            <td>Analogue</td>
                                        </tr>
                                        <tr>
                                            <td>Movement</td>
                                            <td>Quartz</td>
                                        </tr>
                                        <tr>
                                            <td>Power source</td>
                                            <td>Battery</td>
                                        </tr>
                                        <tr>
                                            <td>Dial style</td>
                                            <td>Solid round stainless steel dial</td>
                                        </tr>
                                        <tr>
                                            <td>Features</td>
                                            <td>Reset Time</td>
                                        </tr>
                                        <tr>
                                            <td>Strap style</td>
                                            <td>Silver-Toned bracelet style, stainless steel strap with a foldover
                                                closure
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Water resistance</td>
                                            <td>Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Warranty</td>
                                            <td>3 Months</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <h4>Size & Fit</h4>
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>Dial width</td>
                                            <td>40 mm</td>
                                        </tr>
                                        <tr>
                                            <td>Strap Width</td>
                                            <td>20 mm</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Product Single - Share
                                ============================================= -->
                                <div class="si-share d-flex justify-content-between align-items-center mt-4 border-0">
                                    <h4 class="mb-0">Share:</h4>
                                    <div>
                                        <a href="#" class="social-icon si-borderless si-facebook">
                                            <i class="icon-facebook"></i>
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-twitter">
                                            <i class="icon-twitter"></i>
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-pinterest">
                                            <i class="icon-pinterest"></i>
                                            <i class="icon-pinterest"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-gplus">
                                            <i class="icon-gplus"></i>
                                            <i class="icon-gplus"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-rss">
                                            <i class="icon-rss"></i>
                                            <i class="icon-rss"></i>
                                        </a>
                                        <a href="#" class="social-icon si-borderless si-email3">
                                            <i class="icon-email3"></i>
                                            <i class="icon-email3"></i>
                                        </a>
                                    </div>
                                </div><!-- Product Single - Share End -->

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
                        <div class="col-md-3 col-6 h-translate-y-sm all-ts">
                            <div class="product bg-white">
                                <div class="product-image position-relative">
                                    <div class="fslider" data-pagi="false" data-speed="400" data-pause="200000">
                                        <div class="flexslider">
                                            <div class="slider-wrap">
                                                <div class="slide">
                                                    <a href="demo-store-product-single.html"><img
                                                            src="demos/store/images/product/1-1.jpg"
                                                            alt="Black Shoe"></a>
                                                </div>
                                                <div class="slide">
                                                    <a href="demo-store-product-single.html"><img
                                                            src="demos/store/images/product/1-2.jpg"
                                                            alt="Black Shoe"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="cart-btn button button-white button-light"><i
                                            class="icon-line-plus"></i>Add to Cart</a>
                                </div>
                                <div class="product-desc flex-column px-4">
                                    <div class="product-title">
                                        <h3><a href="demo-store-product-single.html">Black Sports Shoe</a></h3>
                                        <span><a href="#">Nike</a></span>
                                    </div>
                                    <div class="product-price">
                                        <ins>$21.49</ins>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Item 2
                        ============================================= -->
                        <div class="col-md-3 col-6 h-translate-y-sm all-ts">
                            <div class="product bg-white">
                                <div class="product-image position-relative">
                                    <div class="fslider" data-pagi="false" data-speed="400" data-pause="200000">
                                        <div class="flexslider">
                                            <div class="slider-wrap">
                                                <div class="slide">
                                                    <a href="demo-store-product-single.html"><img
                                                            src="demos/store/images/product/2-1.jpg" alt="Sports Shoe"></a>
                                                </div>
                                                <div class="slide">
                                                    <a href="demo-store-product-single.html"><img
                                                            src="demos/store/images/product/2-2.jpg" alt="Sports Shoe"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="cart-btn button button-white button-light"><i
                                            class="icon-line-plus"></i>Add to Cart</a>
                                </div>
                                <div class="product-desc flex-column px-4">
                                    <div class="product-title">
                                        <h3><a href="demo-store-product-single.html">Sports Shoe</a></h3>
                                        <span><a href="#">Nike</a></span>
                                    </div>
                                    <div class="product-price">
                                        <ins>$33.49</ins>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Item 3
                        ============================================= -->
                        <div class="col-md-3 col-6 h-translate-y-sm all-ts">
                            <div class="product bg-white">
                                <div class="product-image position-relative">
                                    <div class="fslider" data-pagi="false" data-speed="400" data-pause="200000">
                                        <div class="flexslider">
                                            <div class="slider-wrap">
                                                <div class="slide">
                                                    <a href="demo-store-product-single.html"><img
                                                            src="demos/store/images/men/items/2.jpg" alt="T-Shirts"></a>
                                                </div>
                                                <div class="slide">
                                                    <a href="demo-store-product-single.html"><img
                                                            src="demos/store/images/men/items/2-1.jpg"
                                                            alt="T-Shirts"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="cart-btn button button-white button-light"><i
                                            class="icon-line-plus"></i>Add to Cart</a>
                                </div>
                                <div class="product-desc flex-column px-4">
                                    <div class="product-title">
                                        <h3><a href="demo-store-product-single.html">Grey T-Shirt</a></h3>
                                        <span><a href="#">T-Shirt</a></span>
                                    </div>
                                    <div class="product-price">
                                        <ins>$11.49</ins>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Item 4
                        ============================================= -->
                        <div class="col-md-3 col-6 h-translate-y-sm all-ts">
                            <div class="product bg-white">
                                <div class="product-image position-relative">
                                    <div class="fslider" data-pagi="false" data-speed="400" data-pause="200000">
                                        <div class="flexslider">
                                            <div class="slider-wrap">
                                                <div class="slide">
                                                    <a href="demo-store-product-single.html"><img
                                                            src="demos/store/images/product/4-1.jpg" alt="T-shirt"></a>
                                                </div>
                                                <div class="slide">
                                                    <a href="demo-store-product-single.html"><img
                                                            src="demos/store/images/product/4-2.jpg" alt="T-shirt"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="cart-btn button button-white button-light"><i
                                            class="icon-line-plus"></i>Add to Cart</a>
                                </div>
                                <div class="product-desc flex-column px-4">
                                    <div class="product-title">
                                        <h3><a href="demo-store-product-single.html">Roundneck T-shirt</a></h3>
                                        <span><a href="#">T-shirt</a></span>
                                    </div>
                                    <div class="product-price">
                                        <ins>$17.49</ins>
                                    </div>
                                </div>
                            </div>
                        </div>

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

