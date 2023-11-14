@extends('admin.layouts.admin-master')
@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box page-title-box-alt">
                            <h4 class="page-title">Product Detail</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                    <li class="breadcrumb-item active">Product Detail</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
                                                @foreach($product->images as $image)
                                                <div id="product-carousel"
                                                     class="carousel slide product-detail-carousel"
                                                     data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <div>
                                                                <img src="{{$image->file_name}}"
                                                                     alt="product-image" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-7">
                                        <div>
                                            <div>
                                                <h5>Category Name : <a class="text-primary">{{$product->category->name}}</a></h5>
                                            </div>
                                            <h2 class="mt-2 bold">{{$product->title}}<a href="{{route('products.edit', $product->id)}}" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a>
                                            </h2>

                                            <div class="mt-3">
                                                <h5>Price :   <b>{{$product->price}}</b></h5>
                                            </div>
                                            <div class="mt-3">
                                                <h5>Published :   <b>{{$product->is_published}}</b></h5>
                                            </div>
                                            <div class="mt-3">
                                                <h5>Stock :   <b>{{$product->stock}}</b></h5>
                                            </div>
                                            <hr/>

                                            <div>
                                                <p>{{$product->description}}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> &copy; Minton theme by <a href="">Coderthemes</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>
@endsection
