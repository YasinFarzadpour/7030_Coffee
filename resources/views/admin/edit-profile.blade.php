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
                            <h4 class="page-title">Edit Profile</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                    <li class="breadcrumb-item active">Edit Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <form action="{{route('profile.update')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
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
                                                                <label for="user-name" class="form-label">Name
                                                                    <span class="text-danger">*</span></label>
                                                                <input type="text" name="name" id="user-name" class="form-control"
                                                                       placeholder="User Name" value="{{$user->name}}">
                                                                @if ($errors->has('name'))
                                                                    <span class="error"> {{ $errors->first('name') }} </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                            <div class="col-lg-3">
                                                                <div class="mb-3">
                                                                    <label for="username" class="form-label">Username
                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="text" name="username" id="username" class="form-control"
                                                                           placeholder="Username" value="{{$user->username}}">
                                                                    @if ($errors->has('username'))
                                                                        <span class="error"> {{ $errors->first('username') }} </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                </div>
                                                <div>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="user-email" class="form-label">Email<span
                                                                    class="text-danger">*</span></label>
                                                                <input type="email" name="email" class="form-control" id="user-email"
                                                                   placeholder="Enter Email" value="{{$user->email}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="user-password" class="form-label">User Password
                                                                    <span class="text-danger">*</span></label>
                                                                <input type="password" name="password" id="user-password" class="form-control"
                                                                       placeholder="Enter Password">
                                                                @if ($errors->has('password'))
                                                                    <span class="error">{{ $errors->first('password') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="password_confirmation" class="form-label">Confirm Password<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                                                                       placeholder="Confirm Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="header-title">User Images</h4>
                                            <p class="sub-header">Upload User Image</p>
                                            <div class="fallback">
                                                <input value="{{$user->image}}" name="image" type="file" multiple/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Preview -->
                                    <div class="preview-sm mt-3" id="file-previews"></div>

                                    <ul class="pager wizard mb-0 list-inline text-end mt-3">
                                        <li class="list-inline-item">
                                            <button type="submit" class="btn btn-success">Update Profile<i
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
