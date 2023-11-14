<header id="header" class="dark transparent-header floating-header header-size-custom" data-sticky-shrink="false"
        data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container-fluid">
            <div class="header-row justify-content-lg-between">

                <!-- Logo
                ============================================= -->
                <div id="logo" class="me-lg-0">
                    <a href="index.html" class="standard-logo"
                       data-dark-logo="{{asset('demos/store/images/7030 (1)_prev_ui.png')}}"><img
                            src="{{asset('demos/store/images/7030-transformed (1).png')}}" style="background-color: transparent; border: none" alt="Canvas Logo"></a>
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
                                    class="btn dropdown-toggle position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                <i class="icon-line2-user"></i></button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('shop.profile.show')}}">Profile</a>
                                <a class="dropdown-item" href="{{route('shop.profile.orders')}}">Orders</a>
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
                    <div>
                    <x-shop.shopping-cart/>
                    </div>
                    <!-- #top-cart end -->


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
