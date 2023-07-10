@extends('layouts.master')
@section('content')
<div class="content">
<!-- Start Content-->
<div class="container-fluid">
<!-- start page title -->
 @include('components.breadcrumb', ['item' => ['/dashboard'=>env('APP_NAME'),'active'=>'My Account'],
        'pTitle' => 'My Account'])
<!-- end page title -->

<div class="row">
<div class="col-xl-4 col-lg-5">
<div class="card text-center">
    <div class="card-body">
        <img src="{{URL::to('/')}}/{{$user->avater}}" class="rounded-circle avatar-lg img-thumbnail"
        alt="profile-image">

        <h4 class="mb-0 mt-2">{{$user->name}}</h4>
        <p class="text-muted font-14">Founder</p>

{{--        <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>--}}
{{--        <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>--}}

        <div class="text-start mt-3">
            <h4 class="font-13 text-uppercase">About Me :</h4>
            <p class="text-muted font-13 mb-3">
                {{$user->bio}}
            </p>
            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{$user->name}}</span></p>

            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{$user->phone}}</span></p>

            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">{{$user->email}}</span></p>

            <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">{{$user->location}}</span></p>
        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->

            </div> <!-- end col-->

            <div class="col-xl-8 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">

                            <li class="nav-item">
                                <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                    Settings
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="settings">
                                <form action="{{route('my.account.update',$user->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter first name" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">User Name</label>
                                                <input type="text" class="form-control" id="username"
                                                name="username" placeholder="Enter last name" value="{{$user->username}}">
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="bio" class="form-label">Bio</label>
                                                <textarea class="form-control" id="bio" name="bio" rows="4" placeholder="Write something...">{{$user->bio}}</textarea>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="{{$user->phone}}">

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$user->email}}">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-file me-1"></i> Profile Photo</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="avater" class="form-label">Avater</label>
                                                <input type="file" class="form-control" name="avater" value="{{$user->avater}}" id="avater" placeholder="Enter company name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <img src="{{URL::to('/')}}/{{$user->avater}}" alt="image" class="img-fluid avatar-lg rounded-0">
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->


                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Company Info</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="company_name" class="form-label">Company Name</label>
                                                <input type="text" class="form-control" name="company_name" value="{{$user->company_name}}" id="company_name" placeholder="Enter company name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="website" class="form-label">Website</label>
                                                <input type="text" class="form-control" name="website" value="{{$user->website}}" id="website" placeholder="Enter website url">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="location" class="form-label">Location</label>
                                                <input type="text" class="form-control" name="location" value="{{$user->location}}" id="location" placeholder="Enter website url">
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- end tab-content -->
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row-->
    </div>
    <!-- container -->
</div>

@endsection
@section('javascript')

@endsection
