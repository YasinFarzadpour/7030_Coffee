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
                             style="background-image: linear-gradient(to bottom, rgba(0,0,0,.1), rgba(0,0,0,.6)), url({{asset('demos/store/images/slider/1.jpg')}});"></div>
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
                             style="background-image: linear-gradient(to bottom, rgba(0,0,0,.1), rgba(0,0,0,.6)), url({{asset('demos/store/images/slider/2.jpg')}});"></div>
                    </div>
                    <div class="swiper-slide dark">
                        <div class="container">
                            <div class="slider-caption">
                                <h2 data-animate="fadeInUp">Instant Coffee</h2>
                                <p class="mb-4" data-animate="fadeInUp" data-delay="100">Fresh and Easy</p>
                            </div>
                        </div>
                        <div class="swiper-slide-bg"
                             style="background-image: linear-gradient(to bottom, rgba(0,0,0,.2), rgba(0,0,0,.3)), url({{asset('demos/store/images/slider/3.jpg')}});"></div>
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


            <x-shop.slider-products type="newest"/>


            <x-shop.slider-products type="top_seller"/>


            <div class="fancy-title title-center title-border mb-lg-6 mt-4">
                <h2 class="titular-title fw-normal center font-secondary fst-normal"><a href="{{route('shop.products.index')}}">VIEW ALL PRODUCTS</a></h2>
            </div>

            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <img src="demos/store/images/others/4.jpg" alt="image" class="mb-4">
                    </div>

                    <div class="col-md-6 mb-5">
                        <img src="demos/store/images/others/5.jpg" alt="image" class="mb-4">
                    </div>
                </div>
            </div>

            <!-- <div class="instagram-button position-relative">
                <div id="instagram-photos" class="instagram-photos masonry-thumbs grid-8" data-user="5834720953" data-count="8" data-type="user" data-resolution="low_resolution"></div>
            </div> -->

        </div>
    </section><!-- #content end -->
@endsection

@section('script')

    <script>
        (function() {
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
                        product_id:id,
                        qty:qty,
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



