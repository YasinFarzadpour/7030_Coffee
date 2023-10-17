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
                            <h4 class="page-title">User</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                    <li class="breadcrumb-item active">User</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{$user->image}}" class="rounded-circle mg-thumbnail" width="250px"
                                     alt="profile-image">

                                <h4 class="mt-3 mb-0">{{$user->name}}</h4>
                                @foreach($user->roles as $role)
                                <p class="text-muted mt-1">{{$role->name}}</p>
                                @endforeach

                                <a href="{{route('users.edit', $user->id)}}"><button type="button" class="btn btn-dark btn-xs waves-effect mb-2 waves-light">Edit User</button></a>

                                <div class="text-start mt-3">
                                    <h4 class="font-13 text-uppercase"></h4>
                                    <p class="text-muted font-13 mb-3">

                                    </p>

                                    <div class="table-responsive">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                            <tr>
                                                <th scope="row">Full Name :</th>
                                                <td class="text-muted">{{$user->name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email :</th>
                                                <td class="text-muted">{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Role :</th>
                                                @foreach($user->roles as $role)
                                                <td class="text-muted">{{$role->name}}</td>
                                                @endforeach
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <ul class="social-list list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i
                                                class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                                class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                                class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                                class="mdi mdi-github"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- end card-box -->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

            </div> <!-- container-fluid -->

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
