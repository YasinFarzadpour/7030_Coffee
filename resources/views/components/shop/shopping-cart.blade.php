<div id="shopping-cart-mini">
<div id="top-cart">
        <a href="#" id="top-cart-trigger" class="position-relative"><i class="icon-line-bag"></i><span
                class="top-cart-number">{{Cart::count()}}</span></a>
        <div class="top-cart-content">
            <div class="top-cart-title">
                <h4>Shopping Cart</h4>
            </div>
            @foreach(Cart::content() as $row)
            <div class="top-cart-items">
                <div class="top-cart-item">
                    <div class="top-cart-item-image">
                        <img src="{{$row->model->images->first()->file_name}}" alt="Blue Shoulder Bag"/>
                    </div>
                    <div class="top-cart-item-desc">
                        <div class="top-cart-item-desc-title">
                            <a href="{{route('shop.products.show', $row->model->id)}}" class="fw-normal">{{$row->name}}</a>
                            <span class="top-cart-item-price d-block">{{number_format($row->price)}}</span>
                        </div>
                        <div class="top-cart-item-quantity fw-semibold">x {{$row->qty}}</div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="top-cart-action">
                <span class="top-checkout-price fw-semibold">{{Cart::total()}}</span>
                <a href="{{route('shop.shopping-cart.show')}}">View Cart</a>
            </div>
        </div>
    </div>
</div>
