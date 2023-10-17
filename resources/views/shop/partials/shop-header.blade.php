<header id="header" class="dark transparent-header floating-header header-size-custom" data-sticky-shrink="false"
        data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container-fluid">
            <div class="header-row justify-content-lg-between">

                <!-- Logo
                ============================================= -->
                <div id="logo" class="me-lg-0">
                    <a href="index.html" class="standard-logo"
                       data-dark-logo="{{asset('demos/store/images/logo-dark.png')}}"><img
                            src="{{asset('demos/store/images/logo.png')}}" alt="Canvas Logo"></a>
                    <a href="index.html" class="retina-logo"
                       data-dark-logo="{{asset('demos/store/images/logo-dark@2x.png')}}"><img
                            src="{{asset('demos/store/images/logo@2x.png')}}" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <div class="header-misc">
                    <!-- Top Login
                ============================================= -->
                    @if(!Auth::check())
                        <div id="top-account" class="px-4">
                            <a href="{{route('login')}}">Login / Register</a>
                        </div>
                    @else
                        <div class="btn-group px-4">
                            <button type="button" style="background-color: transparent ;border:none"
                                    class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <i class="icon-line2-user"></i></button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('shop.profile.show')}}">View Profile</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" class="mb-0" action="{{route('logout')}}">
                                    @csrf
                                    <button class="dropdown-item" type="submit"
                                            style="background-color: transparent ;border:none"><i
                                            class="icon-line-log-out"></i> Log out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif

                    <!-- Top Cart
                    ============================================= -->
                    <div id="top-cart">
                        <a href="#" id="top-cart-trigger" class="position-relative"><i class="icon-line-bag"></i><span
                                class="top-cart-number">5</span></a>
                        <div class="top-cart-content">
                            <div class="top-cart-title">
                                <h4>Shopping Cart</h4>
                            </div>
                            <div class="top-cart-items">
                                <div class="top-cart-item">
                                    <div class="top-cart-item-image">
                                        <a href="#"><img src="{{'demos/shop/images/items/featured/5.jpg'}}"
                                                         alt="Blue Shoulder Bag"/></a>
                                    </div>
                                    <div class="top-cart-item-desc">
                                        <div class="top-cart-item-desc-title">
                                            <a href="#" class="fw-normal">White athletic shoe</a>
                                            <span class="top-cart-item-price d-block">$35.00</span>
                                        </div>
                                        <div class="top-cart-item-quantity fw-semibold">x 1</div>
                                    </div>
                                </div>
                                <div class="top-cart-item">
                                    <div class="top-cart-item-image">
                                        <a href="#" class="fw-normal"><img
                                                src="{{'demos/shop/images/items/featured/1.jpg'}}"
                                                alt="Leather Bag"/></a>
                                    </div>
                                    <div class="top-cart-item-desc">
                                        <div class="top-cart-item-desc-title">
                                            <a href="#" class="fw-normal">Round Neck Solid Light Blue Colour
                                                T-shirts</a>
                                            <span class="top-cart-item-price d-block">$12.49</span>
                                        </div>
                                        <div class="top-cart-item-quantity fw-semibold">x 2</div>
                                    </div>
                                </div>
                            </div>
                            <div class="top-cart-action">
                                <span class="top-checkout-price fw-semibold text-dark">$59.98</span>
                                <button class="button button-dark button-small m-0">View Cart</button>
                            </div>
                        </div>
                    </div><!-- #top-cart end -->

                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path
                            d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                        <path d="m 30,50 h 40"></path>
                        <path
                            d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                    </svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu with-arrows">

                    <!-- Menu Left -->
                    <ul class="not-dark menu-container">
                        <li class="menu-item"><a class="menu-link" href="{{route('shop')}}">
                                <div>Home</div>
                            </a></li>
                        <li class="menu-item mega-menu"><a class="menu-link" href="{{route('shop.products.index')}}">
                                <div>Shop</div>
                            </a></li>
                        <li class="menu-item mega-menu"><a class="menu-link" href="#">
                                <div>Help</div>
                            </a>
                            <div class="mega-menu-content mega-menu-style-2">
                                <div class="container">
                                    <div class="row">
                                        <ul class="mega-menu-column sub-menu-container col-lg-4 border-start-0">
                                            <li class="mega-menu-title menu-item"><a class="menu-link" href="#">
                                                    <div>Contact Us</div>
                                                </a>
                                                <ul class="sub-menu-container">
                                                    <li class="menu-item">
                                                        <div class="widget">
                                                            <address>
                                                                <strong>Melbourne Store:</strong><br>
                                                                795 Folsom Ave, Suite 600<br>
                                                                San Francisco, CA 94107<br>
                                                            </address>
                                                            <abbr title="Phone Number"><strong>Phone:</strong></abbr>
                                                            (1) 8547 632521<br>
                                                            <abbr title="Fax"><strong>Fax:</strong></abbr> (1) 11 4752
                                                            1433<br>
                                                            <abbr title="Email Address"><strong>Email:</strong></abbr>
                                                            info@canvas.com
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="mega-menu-column sub-menu-container col-lg-4 border-start-0">
                                            <li class="mega-menu-title menu-item"><a class="menu-link" href="#">
                                                    <div>Inquiries</div>
                                                </a>
                                                <ul class="sub-menu-container">
                                                    <li class="menu-item"><a class="menu-link" href="#">
                                                            <div>About Us</div>
                                                        </a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#">
                                                            <div>Size Chart</div>
                                                        </a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#">
                                                            <div>Our Policies</div>
                                                        </a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#">
                                                            <div>Exchange/Return</div>
                                                        </a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#">
                                                            <div>Payments</div>
                                                        </a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="mega-menu-column sub-menu-container col-lg-4 border-start-0">
                                            <li class="mega-menu-title menu-item"><a class="menu-link" href="#">
                                                    <div>FAQs</div>
                                                </a>
                                                <ul class="sub-menu-container">
                                                    <li class="menu-item"><a class="menu-link" href="#">
                                                            <div>Q. How do I purchase an item?</div>
                                                        </a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#">
                                                            <div>Q. How do I return my items?</div>
                                                        </a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#">
                                                            <div>Q. Shipping Charges?</div>
                                                        </a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#">
                                                            <div>Q. What is your Delivery time?</div>
                                                        </a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#">
                                                            <div>Q. Is there any hidden Charges?</div>
                                                        </a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li><!-- .mega-menu end -->
                        <li class="menu-item"><a class="menu-link" href="demo-store-contact.html">
                                <div>Contact</div>
                            </a></li>
                        @can('View Admin')
                            <li class="menu-item"><a class="menu-link" href="{{route('admin.index')}}">
                                    <div>Admin</div>
                                </a></li>
                        @endcan
                    </ul>
                </nav><!-- #primary-menu end -->
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>

</header><!-- #header end -->
