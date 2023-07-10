@extends('layouts.master')
@section('css')
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">

        @include('components.breadcrumb', ['item' => ['/dashboard'=>env('APP_NAME'),'active'=>'Application'],
        'pTitle' => $title])

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-xl-8">                   
                            </div>
                            <div class="col-xl-4">
                                <div class="text-xl-end mt-xl-0 mt-2">
                                    <a href="{{route('applications.index')}}" class="btn btn-info mb-2 me-2" data-toggle="tooltip" title="Application List"> <i class="mdi mdi-text me-1"></i>Application Lists</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    {!! Form::model($application,array('route' => ['applications.update',$application->id],'method'=>'PUT','class'=>'','files'=>false)) !!}

                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>R.F Embassy <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::date('rf_embassy', $value=old('rf_embassy'), array('placeholder' => 'R.F Embassy','class' => 'form-control','required'=>true,'id'=>'rf_embassy')) !!}

                                            @if ($errors->has('rf_embassy'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('rf_embassy') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Submit Date <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::date('submit_date', $value=old('submit_date'), array('placeholder' => 'Submit Date','class' => 'form-control','required'=>true,'id'=>'submit_date')) !!}

                                            @if ($errors->has('submit_date'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('submit_date') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Submit Serial No <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::text('serial_no', $value=old('serial_no'), array('placeholder' => 'Serial No','class' => 'form-control','required'=>true,'id'=>'serial_no')) !!}

                                            @if ($errors->has('serial_no'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('serial_no') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Recept No <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::text('recept_no', $value=old('recept_no'), array('placeholder' => 'Recept No','class' => 'form-control','required'=>true,'id'=>'recept_no')) !!}

                                            @if ($errors->has('recept_no'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('recept_no') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Invoice Date <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::date('invoice_date', $value=old('invoice_date'), array('placeholder' => 'Invoice Date','class' => 'form-control','required'=>true,'id'=>'invoice_date')) !!}

                                            @if ($errors->has('invoice_date'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('invoice_date') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Name <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::text('name', $value=old('name'), array('placeholder' => 'Name','class' => 'form-control','required'=>true,'id'=>'name')) !!}

                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Old MRP No <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::text('old_mrp_no', $value=old('old_mrp_no'), array('placeholder' => 'Old MRP No','class' => 'form-control','required'=>true,'id'=>'old_mrp_no')) !!}

                                            @if ($errors->has('old_mrp_no'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('old_mrp_no') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>New MRP No <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::text('new_mrp_no', $value=old('new_mrp_no'), array('placeholder' => 'New MRP No','class' => 'form-control','required'=>true,'id'=>'new_mrp_no')) !!}

                                            @if ($errors->has('new_mrp_no'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('new_mrp_no') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Enrollment No <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::text('enrollment_no', $value=old('enrollment_no'), array('placeholder' => 'Enrollment No','class' => 'form-control','required'=>true,'id'=>'enrollment_no')) !!}

                                            @if ($errors->has('enrollment_no'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('enrollment_no') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Mobile No <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::text('mobile_no', $value=old('mobile_no'), array('placeholder' => 'Mobile No','class' => 'form-control','required'=>true,'id'=>'mobile_no')) !!}

                                            @if ($errors->has('mobile_no'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('mobile_no') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Area/Branch <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                         {!! Form::text('branch_name', $value=old('branch_name'), array('placeholder' => 'Branch Name','class' => 'form-control','required'=>true,'id'=>'branch_name')) !!}

                                         @if ($errors->has('branch_name'))
                                         <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('branch_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                    {{-- <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Area/Branch <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::select('branch_id',$branches ,$value=old('branch_id'), array('class' => 'form-control select2','required'=>true,'id'=>'branch_id')) !!}

                                            @if ($errors->has('branch_id'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('branch_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div> --}}



                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Remarks</strong></label>
                                        <div class="col-6">
                                           {!! Form::textarea('remarks', $value=old('remarks'), array('placeholder' => 'Remarks', 'rows'=> 2, 'class' => 'form-control','readonly'=>false,'id'=>'remarks')) !!}
                                       </div>
                                   </div>


                                   <div class="row pt-3">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary"><i class="la la-check"></i>&nbsp;Update Application</button>
                                        @can('application-list')
                                        <a href="{{route('applications.index')}}" class="btn btn-danger"><i class="la la-times"></i>&nbsp;Cancel </a>
                                        @endcan
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div> 
            </div> 
        </div> 
    </div>
</div> 
</div>

@endsection

