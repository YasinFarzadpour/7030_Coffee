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
                            <h4 class="page-title">Roles List</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Roles & Permissions</a></li>
                                    <li class="breadcrumb-item active">Roles List</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <a href="{{route('roles.create')}}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-1"></i> Add roles</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="me-1">
                                            <label for="rolessearch-input" class="visually-hidden">Search</label>
                                            <input type="search" class="form-control border-light icon-line-search" id="rolessearch-input" placeholder="Search...">
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
                                    <table class="table table-centered w-100 dt-responsive nowrap" id="roles-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="table-light">
                                        <tr>
                                            <th class="all" style="width: 20px;">
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="rolelistCheck">
                                                    <label class="form-check-label" for="rolelistCheck">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th class="all">Role Name</th>
                                            <th class="all">Permissions</th>
                                            <th style="width: 120px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>
                                                    <div class="form-check font-16 mb-0">
                                                        <input class="form-check-input" type="checkbox" id="rolelistCheck1">
                                                        <label class="form-check-label" for="rolelistCheck1">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="m-0 d-inline-block align-middle"><a href="#" class="text-dark">{{$role->name}}</a></h5>
                                                </td>
                                                <td>
                                                    <div class="dropdown mt-2">
                                                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            View Permissions <i class="mdi mdi-chevron-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            @foreach($role->permissions as $permission)
                                                            <h5 class="dropdown-item font-bold">{{$permission->name}}</h5>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="list-inline table-action m-0">
                                                        <li class="list-inline-item">
                                                            <a href="{{route('roles.edit', $role->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <form action="{{route('roles.destroy', $role->id)}}" class="mb-0" method="POST" enctype="multipart/form-data">
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
                                    {{$roles->links()}}
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
