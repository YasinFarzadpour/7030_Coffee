<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!-- Stylesheets
    ============================================= -->
    @include('shop.partials.shop-css')
    <!-- / -->

    <!-- Document Title
    ============================================= -->
    <title>7030_Coffee</title>
</head>
<body class="stretched modal-subscribe-bottom">
<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    @include('shop.partials.shop-header')

    <!-- Slider
    ============================================= -->
    @yield('slider')

    <!-- Content
    ============================================= -->
    @yield('main-content')

    <!-- Footer
    ============================================= -->
    @include('shop.partials.shop-footer')

</div><!-- #wrapper end -->
<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- JavaScripts
============================================= -->
@include('shop.partials.shop-js')

@yield('script')


</body>
</html>
