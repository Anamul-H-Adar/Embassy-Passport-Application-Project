@extends('layouts.master')
@section('css')
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">

        @include('components.breadcrumb', ['item' => ['/dashboard'=>env('APP_NAME'),'active'=>'branch'],
        'pTitle' => 'Branch Edit'])

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-xl-8">                   
                            </div>
                            <div class="col-xl-4">
                                <div class="text-xl-end mt-xl-0 mt-2">
                                    <a href="{{route('area.branch.index')}}" class="btn btn-info mb-2 me-2" data-toggle="tooltip" title="Branch List"> <i class="mdi mdi-text me-1"></i>Branch Lists</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    
                                    {!! Form::model($branch,array('route' => ['area.branch.update',$branch->id],'method'=>'PUT','class'=>'','files'=>true)) !!}

                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-3 col-form-label text-right"><strong>Branch/Area Name <span class="text-danger">*</span></strong></label>
                                        <div class="col-6">
                                            {!! Form::text('name', $value=old('name'), array('placeholder' => 'Branch / Area Name','class' => 'form-control','required'=>true,'id'=>'name')) !!}

                                            @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    

                                    <div class="form-group row mt-2">
                                        <label for="example-text-input" class="col-3 col-form-label text-right"><strong>Remark</strong></label>
                                        <div class="col-6">
                                         {!! Form::textarea('remark', $value=old('remark'), array('placeholder' => 'Remark', 'rows'=> 2, 'class' => 'form-control','readonly'=>false,'id'=>'remark')) !!}
                                     </div>
                                 </div>


                                <div class="row pt-3">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" class="btn btn-primary"><i class="la la-check"></i>&nbsp;Update Branch</button>
                                        @can('user-list')
                                        <a href="{{route('area.branch.index')}}" class="btn btn-danger"><i class="la la-times"></i>&nbsp;Cancel </a>
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