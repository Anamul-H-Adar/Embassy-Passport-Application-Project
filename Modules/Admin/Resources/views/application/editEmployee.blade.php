@extends('layouts.master')
@section('css')
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">

        @include('components.breadcrumb', ['item' => ['/dashboard'=>env('APP_NAME'),'active'=>'Application'],
        'pTitle' => $title])

        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="text-start mt-3">

                            <p class="text-muted mb-2 font-13"><strong>Branch :</strong><span class="ms-2">{{isset($application->branch_name)?$application->branch_name:''}}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>R.F Embassy :</strong> <span class="ms-2 ">{{date('d-M-Y',strtotime($application->rf_embassy))}}</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Submit Date :</strong> <span class="ms-2">{{date('d-M-Y',strtotime($application->submit_date))}}</span></p>
                            <p class="text-muted mb-2 font-13"><strong>Serial No :</strong> <span class="ms-2">{{$application->serial_no}}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Recept No :</strong> <span class="ms-2">{{$application->recept_no}}</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Invoice Date :</strong> <span class="ms-2">{{date('d-M-Y',strtotime($application->invoice_date))}}</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Applicant Name :</strong> <span class="ms-2">{{$application->name}}</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Old MRP No :</strong> <span class="ms-2">{{$application->old_mrp_no}}</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Status :</strong> <span class="ms-2">{{ucwords($application->status)}}</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Mobile No :</strong> <span class="ms-2">{{$application->mobile_no}}</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Remarks :</strong> <span class="ms-2">{{ucwords($application->remarks)}}</span></p>
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
                                    Application
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="settings">
                             {!! Form::model($application,array('route' => ['applications.update',$application->id],'method'=>'PUT','class'=>'','files'=>false)) !!}


                             <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">New MRP No</label>
                                        {!! Form::text('new_mrp_no', $value=old('new_mrp_no'), array('placeholder' => 'New MRP No','class' => 'form-control','required'=>true,'id'=>'new_mrp_no')) !!}

                                        @if ($errors->has('new_mrp_no'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('new_mrp_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Enrollment No</label>
                                        {!! Form::text('enrollment_no', $value=old('enrollment_no'), array('placeholder' => 'Enrollment No','class' => 'form-control','required'=>true,'id'=>'enrollment_no')) !!}

                                        @if ($errors->has('enrollment_no'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('enrollment_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                            </div> <!-- end row -->


                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                            </div>
                            {!! Form::close() !!}
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



