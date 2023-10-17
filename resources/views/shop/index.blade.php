@extends('shop.layouts.shop-master')

@section('slider')
    <section id="slider" class="slider-element swiper_wrapper min-vh-100" data-loop="true" data-speed="1000"
             data-autoplay="5000">
        <div class="slider-inner">

            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption">
                                <h2 data-animate="fadeInUp">Premium Coffee Blends</h2>
                                <p class="mb-4" data-animate="fadeInUp" data-delay="100">Blends Of Our Team</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg"
                             style="background-image: linear-gradient(to bottom, rgba(0,0,0,.1), rgba(0,0,0,.6)), url('demos/store/images/slider/1.jpg');"></div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption">
                                <h2 data-animate="fadeInUp">New Brewing Equipments</h2>
                                <p class="mb-4" data-animate="fadeInUp" data-delay="100">Looking for something to make
                                    great coffee with?</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg"
                             style="background-image: linear-gradient(to bottom, rgba(0,0,0,.1), rgba(0,0,0,.6)), url('demos/store/images/slider/2.jpg');"></div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption">
                                <h2 data-animate="fadeInUp">Instant Coffee</h2>
                                <p class="mb-4" data-animate="fadeInUp" data-delay="100">Fresh and Easy</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg"
                             style="background-image: linear-gradient(to bottom, rgba(0,0,0,.2), rgba(0,0,0,.3)), url('demos/store/images/slider/3.jpg');"></div>
                    </div>
                </div>
                <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
                <div class="slide-number">
                    <div class="slide-number-current"></div>
                    <span>/</span>
                    <div class="slide-number-total"></div>
                </div>
            </div>

            <div class="social-icons">
                <a href="#" class="social-icon si-small si-borderless si-rounded si-facebook">
                    <i class="icon-facebook text-white-50"></i>
                    <i class="icon-facebook"></i>
                </a>
                <a href="#" class="social-icon si-small si-borderless si-rounded si-instagram">
                    <i class="icon-instagram text-white-50"></i>
                    <i class="icon-instagram"></i>
                </a>
                <a href="#" class="social-icon si-small si-borderless si-rounded si-youtube">
                    <i class="icon-youtube text-white-50"></i>
                    <i class="icon-youtube"></i>
                </a>
            </div>

        </div>
    </section><!-- #Slider End -->
@endsection

@section('main-content')
    <section id="content">
        <div class="content-wrap pb-0">


            <div class="container-fluid">
                <div class="mx-auto center bottommargin" style="max-width: 700px">
                    <h2>Our Mission</h2>
                    <p>7030 Coffee is on a mission to increase access to high quality coffee and learn about new brewing
                        method.</p>
                </div>
            </div>

            <div class="clear divider"></div>

            <div class="line line-sm"></div>
                <div class="container-fluid">
                <div class="row mt-2">
                    @foreach($categories as $category)
                        <div class="col-md-4 mb-5">
                            <div class="card cat-card rounded-0 border-0 dark">
                                <img src="demos/store/images/slider/1.jpg" class="card-img rounded-0" alt="...">
                                <div class="d-flex align-items-start flex-column card-img-overlay p-4">
                                    <h3 class="h3 text-white ls--1 fw-bold mt-2 mb-auto"></h3>
                                    <h3 class="h2 text-white ls--1 fw-bold mb-4">{{$category->name}}</h3>
                                    <a href="{{route('shop.products.index', ['cate[]'=>$category->id])}}"
                                       class="button button button-white button-light ms-0">View Products</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
            <div class="line line-sm"></div>
            <div class="clear divider"></div>

            <div class="container-fluid topmargin">
                <div class="container-fluid">
                    <div class="mx-auto center bottommargin" style="max-width: 700px">
                        <h2 class="h1 fw-bold ls--1 color">...New Products...</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($newestProducts as $product)
                                <div class="col-lg-2 col-md-2 mb-2">
                                    <div class="product">
                                        <div class="product-image position-relative">
                                            <div class="fslider" data-pagi="false" data-speed="400" data-pause="10000">
                                                <div class="flexslider">
                                                    <div class="slider-wrap">
                                                        @foreach($product->images as $image)
                                                            <div class="slide">
                                                                <a href="{{route('shop.products.show', $product->id)}}"><img
                                                                        src="{{$image->file_name}}"
                                                                        alt="Black Shoe"></a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="cart-btn button button-white button-light"><i
                                                    class="icon-line-plus"></i>Add to Cart</a>
                                        </div>
                                        <div class="product-desc">
                                            <div class="product-title">
                                                <h3>
                                                    <a href="{{route('shop.products.show', $product->id)}}">{{$product->title}}</a>
                                                </h3>
                                                <span>{{$product->category->name}}</span>
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
            </div>

            <div class="line line-sm"></div>
            <div class="clear divider"></div>

            <div class="container-fluid topmargin">
                <div class="container-fluid">
                    <div class="mx-auto center bottommargin" style="max-width: 700px">
                        <h2 class="h1 fw-bold ls--1 color">...Top Seller Products...</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($topSellerProducts as $product)
                                <div class="col-lg-2 col-md-2 mb-2">
                                    <div class="product">
                                        <div class="product-image position-relative">
                                            <div class="fslider" data-pagi="false" data-speed="400" data-pause="10000">
                                                <div class="flexslider">
                                                    <div class="slider-wrap">
                                                        @foreach($product->images as $image)
                                                            <div class="slide">
                                                                <a href="{{route('shop.products.show', $product->id)}}"><img
                                                                        src="{{$image->file_name}}"
                                                                        alt="Black Shoe"></a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="cart-btn button button-white button-light"><i
                                                    class="icon-line-plus"></i>Add to Cart</a>
                                        </div>
                                        <div class="product-desc">
                                            <div class="product-title">
                                                <h3>
                                                    <a href="{{route('shop.products.show', $product->id)}}">{{$product->title}}</a>
                                                </h3>
                                                <span>{{$product->category->name}}</span>
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
            </div>

            <div class="clear divider"></div>

            <div class="line line-sm"></div>

            <div class="container-fluid">
                <div class="mx-auto center bottommargin" style="max-width: 700px">
                    <h2 class="h1 fw-bold ls--1 color">
                        <a href="{{route('shop.products.index')}}"> View All Products  <i class="icon-line-fast-forward small"></i></a>
                    </h2>
                </div>
            </div>

            <div class="clear divider"></div>

            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <img src="demos/store/images/others/4.jpg" alt="image" class="mb-4">
                        <h4 class="mb-2"><a href="#">Want to travel? Great Stuffs for Travel</a></h4>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo doloremque
                            eveniet dolorem, porro earum. Eius, corrupti provident iusto modi sunt.</p>
                        <a href="#" class="stretched-link btn p-0 fw-semibold"><u>View Details</u> <i
                                class="icon-line-arrow-right position-relative ms-1" style="top: 2px"></i></a>
                    </div>

                    <div class="col-md-6 mb-5">
                        <img src="demos/store/images/others/5.jpg" alt="image" class="mb-4">
                        <h4 class="mb-2">Our Melbourne Store</h4>
                        <p class="mb-2">Authoritatively deliver 2.0 niches vis-a-vis backward-compatible infomediaries.
                            Authoritatively actualize empowered e-tailers with just in time.</p>
                        <p class="mb-3"><i class="icon-map-marker-alt"></i> <strong>Headquarters: </strong><a href="#"
                                                                                                              class="text-black-50 under btn-link">
                                795 Folsom Ave, Suite 600 San Francisco, CA 94107</a></p>
                        <a href="#" class="btn p-0 fw-semibold"><u>Visit Our Store</u> <i
                                class="icon-line-arrow-right position-relative ms-1" style="top: 2px"></i></a>
                    </div>
                </div>
            </div>

            <div class="section m-0 border-0" style="padding: 120px 0;">
                <div class="video-wrap" style="z-index: 0">
                    <video poster="one-page/images/page/portrait/video-poster.jpg" preload="auto" loop autoplay muted>
                        <source src='one-page/images/page/portrait/video.mp4' type='video/mp4'/>
                    </video>
                    <div class="video-overlay" style="background: rgba(0,0,0,0.2)"></div>
                </div>
                <div class="emphasis-title widget subscribe-widget mx-auto center px-4" data-loader="button"
                     style="max-width: 650px">
                    <h2 class="fw-bold text-white">Subscribe Now</h2>
                    <p class="mb-5 text-white-50 lead" data-delay="100">Subscribe to Our Newsletter to get Important
                        News, Amazing Offers & Inside Scoops:</p>
                    <div class="widget-subscribe-form-result"></div>
                    <form id="widget-subscribe-form-2" action="include/subscribe.php" method="post"
                          class="mt-1 input-group input-group-lg mb-0">
                        <input type="email" id="widget-subscribe-form-2-email" name="widget-subscribe-form-email"
                               class="form-control required email rounded-0 border-0"
                               placeholder="Enter your Email Address">

                        <button class="btn btn-dark bg-color rounded-0 text-uppercase fw-bold" type="submit"
                                style="font-size: 16px">Subscribe Now
                        </button>
                    </form>
                </div>
            </div>

            <div class="section mt-0 mb-0" style="padding: 80px 0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <h4 class="text-uppercase">Shipping Worldwide</h4>
                            <p>Minimum $999 for free Shipping. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Odio sequi natus eveniet, dicta magni! Modi nihil quis quos at mollitia.</p>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h4 class="text-uppercase">Free Returns</h4>
                            <p class="h6 fw-bold">Within 30 days Guarantee</p>
                            <p>Synergistically repurpose ethical value and backend paradigms. Holisticly architect
                                effective expertise for installed base e-markets.</p>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h4 class="text-uppercase">Customer Service</h4>
                            <p>Odio sequi natus eveniet, dicta magni! Modi nihil quis quos at mollitia.</p>
                            <abbr title="Phone Number"><strong>Phone:</strong></abbr> (+0) 9876 543211<br>
                            <abbr title="Fax"><strong>Fax:</strong></abbr> (+0) 11 2222 3333<br>
                            <abbr title="Email Address"><strong>Email:</strong></abbr> noreply@canvas.com<br>

                            <a href="#" class="social-icon si-small si-light si-rounded si-facebook mt-4 me-2">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="#" class="social-icon si-small si-light si-rounded si-instagram mt-4 me-2">
                                <i class="icon-instagram"></i>
                                <i class="icon-instagram"></i>
                            </a>
                            <a href="#" class="social-icon si-small si-light si-rounded si-youtube mt-4 me-2">
                                <i class="icon-youtube"></i>
                                <i class="icon-youtube"></i>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <h4 class="text-uppercase">Our Stores</h4>
                            <address>
                                <strong>Melbourne Store:</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                            </address>

                            <address class="mb-3">
                                <strong>Sydney Store:</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                            </address>
                            <abbr title="Time"><strong>Timing:</strong></abbr> Every day: 10am – 7pm<br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section bg-transparent py-3">
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

            <!-- <div class="instagram-button position-relative">
                <div id="instagram-photos" class="instagram-photos masonry-thumbs grid-8" data-user="5834720953" data-count="8" data-type="user" data-resolution="low_resolution"></div>
            </div> -->

        </div>
    </section><!-- #content end -->
@endsection


