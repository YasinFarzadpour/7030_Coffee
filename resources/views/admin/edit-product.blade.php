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
                            <h4 class="page-title">Edit Product</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                    <li class="breadcrumb-item active">Edit Product</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <form action="{{route('products.update', $product->id)}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <div id="addproduct-nav-pills-wizard" class="twitter-bs-wizard form-wizard-header">
                                        <ul class="twitter-bs-wizard-nav mb-2">
                                            <li class="nav-item">
                                                <a href="#general-info" class="nav-link" data-bs-toggle="tab"
                                                   data-toggle="tab">
                                                    <span class="d-none d-sm-inline">General</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content twitter-bs-wizard-tab-content">
                                            <div class="tab-pane" id="general-info">
                                                <h4 class="header-title">General Information</h4>
                                                <p class="sub-header">Fill all information below</p>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="product-title" class="form-label">Product Title
                                                                    <span class="text-danger">*</span></label>
                                                                <input type="text" name="title" id="product-title" class="form-control"
                                                                       placeholder="Product Name" value="{{$product->title}}">
                                                                @if ($errors->has('title'))
                                                                    <span class="error">{{ $errors->first('title') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="product-category" class="form-label">Categories
                                                                    <span class="text-danger">*</span></label>
                                                                <select class="form-control select2" id="product-category" name="category_id">
                                                                    @foreach($categories as $category)
                                                                        @if($category->id == $product->category->id)
                                                                            <option selected value="{{$category->id}}">{{$category->name}}</option>
                                                                        @else
                                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="product-price" class="form-label">Price <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="number" name="price" class="form-control" id="product-price"
                                                                       placeholder="Enter amount" value="{{$product->price}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="product-description" class="form-label">Product
                                                        Description <span class="text-danger">*</span></label>
                                                    <div >
                                                        <textarea class="form-control" style="height: 200px; width: 870px" name="description" id="product-description">{{$product->description}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="header-title">Product Images</h4>
                                            <p class="sub-header">Upload product image</p>
                                            <div class="fallback">
                                                <input value="{{$product->image}}" name="image" type="file" multiple/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Preview -->
                                    <div class="preview-sm mt-3" id="file-previews"></div>

                                    <ul class="pager wizard mb-0 list-inline text-end mt-3">
                                        <li class="list-inline-item">
                                            <button type="submit" class="btn btn-success">Update Product<i
                                                    class="mdi mdi-arrow-right ms-1"></i></button>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <!-- end row -->

            <!-- file preview template -->
            <div class="d-none" id="uploadPreviewTemplate">
                <div class="card mt-1 mb-0 shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                            </div>
                            <div class="col ps-0">
                                <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                <p class="mb-0" data-dz-size></p>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                    <i class="fe-x"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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

@section('scripts')

    <!-- Plugins js-->
    <script src="{{asset('assets/Admin/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>

    <!-- Plugins js -->
    <script src="{{asset('assets/Admin/libs/quill/quill.min.js')}}"></script>

    <!-- Select2 js-->
    <script src="{{asset('assets/Admin/libs/select2/js/select2.min.js')}}"></script>
    <!-- Dropzone file uploads-->
    <script src="{{asset('assets/Admin/libs/dropzone/min/dropzone.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/Admin/js/pages/form-fileuploads.init.js')}}"></script>

    <!-- Init js -->
    <script src="{{asset('assets/Admin/js/pages/add-product.init.js')}}"></script>

@endsection

