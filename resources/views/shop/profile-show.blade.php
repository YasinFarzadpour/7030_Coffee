@extends('shop.layouts.shop-master')
@section('main-content')
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

                                <div class="line line-sm"></div>

                                <div class="table-responsive">
                                    <table class="table table-borderless table-sm">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Full Name :</th>
                                            <td class="text-muted">{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Username :</th>
                                            <td class="text-muted">{{$user->username}}</td>
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

                                <div class="line line-sm"></div>

                                <div>
                                    <a href="{{route('shop.profile.edit')}}"><button class="edit-user btn btn-primary m-0">Edit Profile</button></a>
                                </div>


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

@endsection
