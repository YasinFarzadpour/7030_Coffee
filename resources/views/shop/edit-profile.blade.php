@extends('shop.layouts.shop-master')
@section('main-content')
    <form action="{{route('shop.profile.update')}}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    <section id="content">
        <div class="content-wrap pb-0">
            <div class="clear"></div>

            <div class="single-user mb-6">
                <div class="user">
                    <div class="container-fluid">
                        <div class="row gutter-50">
                            <div class="col-xl-7 col-lg-5 mb-0 sticky-sidebar-wrap">
                                <div class="masonry-thumbs grid-container grid-2" data-lightbox="gallery">
                                    <a class="grid-item" data-lightbox="gallery-item"><img src="{{$user->image}}" alt="user image"></a>
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-7 mt-6">

                                <div class="row"><h2>User Profile Information:</h2></div>

                                <div class="table-responsive">
                                    <table class="table table-borderless table-sm">
                                        <tbody>
                                        <tr>
                                            <div class="mb-3">
                                                <label for="user-name" class="form-label">Name
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="name" id="user-name" class="form-control"
                                                       placeholder="User Name" value="{{$user->name}}">
                                                @if ($errors->has('name'))
                                                    <span class="error"> {{ $errors->first('name') }} </span>
                                                @endif
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="username" id="username" class="form-control"
                                                       placeholder="Username" value="{{$user->username}}">
                                                @if ($errors->has('username'))
                                                    <span class="error"> {{ $errors->first('username') }} </span>
                                                @endif
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="mb-3">
                                                <label for="user-email" class="form-label">Email<span
                                                        class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control" id="user-email"
                                                       placeholder="Enter Email" value="{{$user->email}}">
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="mb-3">
                                                <label for="user-password" class="form-label">User Password
                                                    <span class="text-danger">*</span></label>
                                                <input type="password" name="password" id="user-password" class="form-control"
                                                       placeholder="Enter Password">
                                                @if ($errors->has('password'))
                                                    <span class="error">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Confirm Password<span
                                                        class="text-danger">*</span></label>
                                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                                                       placeholder="Confirm Password">
                                            </div>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mb-3">
                                    <label for="user-image" class="form-label">User Image</label>
                                    <div>
                                        <input value="{{$user->image}}" name="image" type="file" multiple/>
                                    </div>
                                </div>
                                <!-- Preview -->
                                <div class="preview-sm mt-3" id="file-previews"></div>


                                <div>
                                    <button type="submit" class="edit-user btn btn-success mt-4">Update Profile</button>
                                </div>


                                <div class="line line-sm"></div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="section bg-transparent my-3">
                <div class="container-fluid">
                    <div class="row justify-content-center m-auto" style="max-width: 1000px;">
                        <div class="col-md-7">
                            <p class="h6 mb-0 text-muted">Conveniently network effective total linkage via intermandated
                                opportunities. Distinctively <a
                                    href="mailto:noreply@canvas.com"><u>noreply@canvas.com</u></a> premium products.</p>
                        </div>
                        <div class="col-md-5 mt-3 mt-md-0">
                            <h2 class="h1 fw-bold ls--1 color"><a href="tel:09876543211">(+0) 9876 543210</a></h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    </form>

@endsection
