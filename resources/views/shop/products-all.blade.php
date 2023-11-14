@extends('shop.layouts.shop-master')
@section('main-content')
    <!-- Page Title
		============================================= -->
    <section id="page-title" class="page-title-parallax page-title-dark page-title-center"
             style="background-image: url('demos/store/images/men/8.jpg'); background-size: cover; padding: 170px 0 100px;"
             data-bottom-top="background-position: 50% 200px;" data-top-bottom="background-position: 50% -200px;">

        <div class="container clearfix">
            <h1>All Products</h1>
            <span>A Fresh Collections Of All You Need</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="content">
        <div class="content-wrap pb-0">
            <div class="container-fluid topmargin">
                <div class="row">


                    <div class="form-check col-md-2 sticky-sidebar-wrap">
                        <form method="GET" action={{route('shop.products.index')}}>
                            @csrf
                            <ul class="list-unstyled items-nav sticky-sidebar" data-container="#shop">
                                <li><a href="{{route('shop.products.index')}}" class="text-dark fw-semibold"
                                       data-filter="*">All Products</a></li>
                                <li>
                                    <hr>
                                </li>
                                <li><a class="text-dark fw-semibold mb-2" data-filter="*">Categories: </a></li>
                                @foreach($categories as $category)
                                    <li>
                                        <input class="form-check-input" type="checkbox" name="cate[]"
                                               value="{{$category->id}}"
                                               id="{{$category->id}}" {{request()->filled('cate') && in_array($category->id,request()->cate) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="{{$category->id}}">
                                            {{$category->name}}
                                        </label>
                                    </li>
                                @endforeach
                                <li>
                                    <hr>
                                </li>
                                <li><a class="text-dark fw-semibold mb-2" data-filter="*">Sort By: </a></li>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="sort_by"
                                           value="title" id="title"
                                           onclick="onlyOne(this)" {{request()->filled('sort_by') && ('title'==request()->sort_by) ? 'checked' : ''}}>
                                    <label class="form-check-label" for="title">
                                        Name
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="sort_by"
                                           value="price_asc" id="price_asc"
                                           onclick="onlyOne(this)" {{request()->filled('sort_by') && ('price_asc'==request()->sort_by) ? 'checked' : ''}}>
                                    <label class="form-check-label" for="price_asc">
                                        Lowest Price
                                    </label>
                                </li>
                                <li>
                                    <input class="form-check-input" type="checkbox" name="sort_by"
                                           value="price_desc" id="price_desc"
                                           onclick="onlyOne(this)" {{request()->filled('sort_by') && ('price_desc'==request()->sort_by) ? 'checked' : ''}}>
                                    <label class="form-check-label" for="price_desc">
                                        Highest Price
                                    </label>
                                </li>
                                <hr>
                            </ul>
                            <button type="submit" class="btn btn-dark ">Apply Filters</button>
                        </form>
                    </div>

                    <div class="col-md-10">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-3 col-md-2 mb-2">
                                    <div class="product">
                                        <div class="product-image position-relative">
                                            <div class="fslider" data-pagi="false" data-speed="400" data-pause="10000">
                                                <div class="flexslider">
                                                    <div class="slider-wrap">
                                                        @foreach($product->images as $image)
                                                            <div class="slide">
                                                                <a href="{{route('shop.products.show', $product->id)}}"><img
                                                                        src="{{$image->file_name}}" style="height: 200px;"
                                                                        alt="product_image"></a>
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
                                        <div class="product-desc">
                                            <div class="product-title">
                                                <h3>
                                                    <a class="fw-bold"
                                                       href="{{route('shop.products.show', $product->id)}}">{{$product->title}}</a>
                                                </h3>
                                                <span><a>{{$product->category->name}}</a></span>
                                                <hr>
                                                <h5>Stock :   <span>{{$product->stock > 0 ? $product->stock : "out of stock"}}</span></h5>
                                            </div>
                                            <div class="product-price text-end">
                                                <ins>{{number_format($product->price) }} Toman</ins>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-5">
                            {{$products->withQueryString()->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- #content end -->

    <script>
        function onlyOne(checkbox) {
            var checkboxes = document.getElementsByName('sort_by');
            checkboxes.forEach((item) => {
                if (item !== checkbox) item.checked = false;
            })
        }
    </script>

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
