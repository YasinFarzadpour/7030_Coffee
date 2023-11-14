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
                            <h4 class="page-title">Products List</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                    <li class="breadcrumb-item active">Products List</li>
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
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <a href="{{route('products.create')}}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-1"></i> Add Products</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="me-1">
                                            <label for="productssearch-input" class="visually-hidden">Search</label>
                                            <input type="search" class="form-control border-light icon-line-search" id="productssearch-input" placeholder="Search...">
                                        </div>
                                    </div><!-- end col-->
                                </div>
                                <!-- end row -->

                                    @if(Session::has('store-message'))
                                    <div class="alert alert-success">{{Session::get('store-message')}}</div>
                                    @elseif(Session::has('update-message'))
                                    <div class="alert alert-success">{{Session::get('update-message')}}</div>
                                    @elseif(Session::has('destroy-message'))
                                    <div class="alert alert-danger">{{Session::get('destroy-message')}}</div>
                                    @endif




                                <div class="table-responsive">
                                    <table class="table table-centered w-100 dt-responsive nowrap" id="products-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="table-light">
                                        <tr class="text-center">
                                            <th class="all" style="width: 20px;">
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="productlistCheck">
                                                    <label class="form-check-label" for="productlistCheck">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th class="all">Product Title</th>
                                            <th>Category</th>
                                            <th>Added Date</th>
                                            <th>Price</th>
                                            <th>Published</th>
                                            <th>Stock</th>
                                            <th style="width: 50px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                        <tr class="text-center">
                                            <td>
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="productlistCheck1">
                                                    <label class="form-check-label" for="productlistCheck1">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{route('products.show', $product->id)}}"><img src="{{$product->images->first()?->file_name}}" alt="product-image" title="product-image" class="rounded me-3" height="48" /></a>

                                                <h5 class="m-0 d-inline-block align-middle"><a href="{{route('products.show', $product->id)}}" class="text-dark">{{$product->title}}</a></h5>
                                            </td>
                                            <td>
                                                {{$product->category->name}}
                                            </td>
                                            <td>
                                                {{$product->created_at}}
                                            </td>
                                            <td>
                                                {{number_format($product->price)}}
                                            </td>
                                            <td>
                                                {{$product->is_published}}
                                            </td>
                                            <td>
                                                {{$product->stock}}
                                            </td>
                                            <td>
                                                <ul class="list-inline table-action m-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{route('products.show', $product->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{route('products.edit', $product->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                    <form action="{{route('products.destroy', $product->id)}}" class="mb-0" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="background-color: transparent ;border:none" class="action-icon"><i class="mdi mdi-delete"></i></button>
                                                    </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-2">
                                    {{$products->links()}}
                                </div>
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
