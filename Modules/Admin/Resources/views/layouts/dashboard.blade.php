@extends('layouts.master')
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Users</h5>
                                <h3 class="mt-3 mb-3">{{ $users??0 }}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="@if($user_percent>50) text-success me-2 @else text-danger me-2 @endif "><i class="@if($user_percent>50) mdi mdi-arrow-up-bold @else mdi mdi-arrow-down-bold @endif"></i> {{ $user_percent }}%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-sm-6">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Branch</h5>
                                <h3 class="mt-3 mb-3">{{ $branch??0 }}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="@if($branch_percent>50) text-success me-2 @else text-danger me-2 @endif "><i class="@if($branch_percent>50) mdi mdi-arrow-up-bold @else mdi mdi-arrow-down-bold @endif"></i> {{ $branch_percent }}%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

                <div class="row">

                    <div class="col-sm-12">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-pulse widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0" title="Growth">Application</h5>
                                <h3 class="mt-3 mb-3">+ {{ $application_percent }}%</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> {{ $application_percent }}%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container -->
</div>

@endsection
@section('javascript')

@endsection
