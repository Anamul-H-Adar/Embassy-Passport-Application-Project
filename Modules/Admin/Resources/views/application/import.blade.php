@extends('layouts.master')
@section('css')
@endsection
@section('content')

    <div class="content">
        <div class="container-fluid">

            @include('components.breadcrumb', ['item' => ['/dashboard'=>env('APP_NAME'),'active'=>'Application'],
            'pTitle' => $title])

            <div class="card" style="margin-bottom: 25px;">
                <div class="card-header bg-info text-white" style="cursor: pointer;">
                    <h4>
                        <strong>Upload Students</strong>
                        <a class="btn btn-success btn-sm" style="float: right" href="{{URL::to('backend')}}/assets/upload-application.xlsx" download><i class=" fa fa-plus"></i>&nbsp;Download Sample File</a>
                        <a class="btn btn-info btn-sm" style="float: right" href="{{route('applications.index')}}" ><i class=" fa fa-plus"></i>&nbsp;Application Lists</a>
                    </h4>
                </div>
                <div class="card-body">
                        {!! Form::open(array('route' => 'applications.file.import.store','method'=>'POST','class'=>'','files'=>true)) !!}
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label text-right"><strong>Branch <span class="text-danger">*</span></strong></label>
                        <div class="col-6">
                            {!! Form::select('branch_id',$branches ,$value=old('branch_id'), array('class' => 'form-control select2','required'=>true,'id'=>'branch_id')) !!}

                            @if ($errors->has('branch_id'))
                                <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('branch_id') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label text-right mt-2"><strong>Branch <span class="text-danger">*</span></strong></label>
                        <div class="col-6">
                            {!! Form::file('file', array('class' => 'form-control','required'=>true,'id'=>'branch_id')) !!}

                            @if ($errors->has('file'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('file') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-upload"></i>&nbsp; Upload Application</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
