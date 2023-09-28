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
                            <h4 class="page-title">Update Role</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Roles & Permissions</a></li>
                                    <li class="breadcrumb-item active">Update Role</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <form action="{{route('roles.update',$role->id)}}" method="POST"  enctype="multipart/form-data">
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
                                                                <label for="role-name" class="form-label">Role Name
                                                                    <span class="text-danger">*</span></label>
                                                                <input type="text" name="name" id="role-name" class="form-control"
                                                                       placeholder="Role Name" value="{{$role->name}}">
                                                                @if ($errors->has('name'))
                                                                    <span class="error">{{ $errors->first('name') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="permission-role" class="form-label">Permissions
                                                                    <span class="text-danger">*</span></label>
                                                                <select class="form-control select2-multiple select-int" name="permissions[]" multiple="multiple" data-placeholder="Choose">
                                                                    @foreach($permissions as $permission)
                                                                        @if($role->permissions->contains($permission))
                                                                            <option selected value="{{$permission->id}}">{{$permission->name}}</option>
                                                                        @else
                                                                            <option value="{{$permission->id}}">{{$permission->name}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="pager wizard mb-0 list-inline text-end mt-3">
                                        <li class="list-inline-item">
                                            <button type="submit" class="btn btn-success">Update Role<i
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

    <script>

        $(document).ready(function() {
            $('.select-int').select2(
                {

                }
            );
        });
    </script>

@endsection
