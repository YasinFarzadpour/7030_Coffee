<div>
    <div class="container-fluid topmargin">
        <div class="container-fluid">
            <div class="fancy-title title-center title-border-color mt-6">
                <h3 class="titular-title fw-normal center font-secondary fst-normal">{{$title}}</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-2 mb-2 divider-border">
                            <div class="product">
                                <div class="product-image position-relative">
                                    <div class="fslider" data-pagi="false" data-speed="400" data-pause="10000">
                                        <div class="flexslider">
                                            <div class="slider-wrap">
                                                @foreach($product->images as $image)
                                                    <div class="slide">
                                                        <a href="{{route('shop.products.show', $product->id)}}"><img
                                                                src="{{$image->file_name}}" style="height: 200px"
                                                                alt="Black Shoe"></a>
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
                                        <h3 class="font-monospace font-bold mb-1">
                                            <a href="{{route('shop.products.show', $product->id)}}">{{$product->title}}</a>
                                        </h3>
                                        <span>{{$product->category->name}}</span>
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
            </div>
        </div>
    </div>
</div>
