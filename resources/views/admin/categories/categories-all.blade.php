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
                            <h4 class="page-title">categories List</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                    <li class="breadcrumb-item active">categories List</li>
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
                                        <a href="{{route('categories.create')}}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-1"></i> Add category</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="me-1">
                                            <label for="categoriessearch-input" class="visually-hidden">Search</label>
                                            <input type="search" class="form-control border-light icon-line-search" id="categoriessearch-input" placeholder="Search...">
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
                                    <table class="table table-centered w-100 dt-responsive nowrap" id="categories-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="table-light">
                                        <tr>
                                            <th class="all" style="width: 20px;">
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="categorylistCheck">
                                                    <label class="form-check-label" for="categorylistCheck">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th class="all">category Name</th>
                                            <th>Show Products</th>
                                            <th>Added Date</th>
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>
                                                    <div class="form-check font-16 mb-0">
                                                        <input class="form-check-input" type="checkbox" id="categorylistCheck1">
                                                        <label class="form-check-label" for="categorylistCheck1">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$category->name}}
                                                </td>
                                                <td>
                                                    <div>
                                                        <h5 class="product-box align-middle"><a href="{{route('categories.show', $category->id)}}" class="text-primary">{{$category->name}}</a></h5>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$category->created_at}}
                                                </td>
                                                <td>
                                                    <ul class="list-inline table-action m-0">
                                                        <li class="list-inline-item">
                                                            <a href="{{route('categories.edit', $category->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <form action="{{route('categories.destroy', $category->id)}}" class="mb-0" method="POST" enctype="multipart/form-data">
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
                                    {{$categories->links()}}
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
