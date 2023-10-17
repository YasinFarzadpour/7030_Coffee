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
                            <h4 class="page-title">Users List</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                    <li class="breadcrumb-item active">users List</li>
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
                                        <a href="{{route('users.create')}}" class="btn btn-success mb-2"><i class="mdi mdi-plus-circle me-1"></i> Add users</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="me-1">
                                            <label for="userssearch-input" class="visually-hidden">Search</label>
                                            <input type="search" class="form-control border-light icon-line-search" id="userssearch-input" placeholder="Search...">
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
                                    <table class="table table-centered w-100 dt-responsive nowrap" id="users-datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="table-light">
                                        <tr>
                                            <th class="all" style="width: 20px;">
                                                <div class="form-check font-16 mb-0">
                                                    <input class="form-check-input" type="checkbox" id="userlistCheck">
                                                    <label class="form-check-label" for="userlistCheck">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th class="all">Name</th>
                                            <th class="all">Username</th>
                                            <th class="all">Roles</th>
                                            <th>Email</th>
                                            <th>Added Date</th>
                                            <th style="width: 85px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="form-check font-16 mb-0">
                                                        <input class="form-check-input" type="checkbox" id="userlistCheck1">
                                                        <label class="form-check-label" for="userlistCheck1">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{route('users.show', $user->id)}}"><img src="{{$user->image}}" alt="user-image" title="user-image" class="rounded me-3" height="48" /></a>
                                                    <h5 class="m-0 d-inline-block align-middle"><a href="{{route('users.show', $user->id)}}" class="text-dark">{{$user->name}}</a></h5>
                                                </td>
                                                <td>
                                                    {{$user->username}}
                                                </td>
                                                <td>
                                                    <div class="dropdown mt-2">
                                                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            View Roles <i class="mdi mdi-chevron-down"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            @foreach($user->roles as $role)
                                                                <h5 class="dropdown-item font-bold">{{$role->name}}</h5>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$user->email}}
                                                </td>
                                                <td>
                                                    {{$user->created_at}}
                                                </td>
                                                <td>
                                                    <ul class="list-inline table-action m-0">
                                                        <li class="list-inline-item">
                                                            <a href="{{route('users.edit', $user->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <form action="{{route('users.destroy', $user->id)}}" class="mb-0" method="POST" enctype="multipart/form-data">
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
                                    {{$users->links()}}
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
