@extends('layouts.master')
@section('css')
@include('yajra.css')
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        @include('components.breadcrumb', ['item' => ['/'=>env('APP_NAME'),'active'=>'Branch'],
        'pTitle' => 'Branch'])

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-xl-8">                   
                            </div>
                            <div class="col-xl-4">
                                <div class="text-xl-end mt-xl-0 mt-2">
                                    <a href="{{route('area.branch.create')}}" class="btn btn-info mb-2 me-2" data-toggle="tooltip" title="Add New Branch"> <i class="mdi mdi-plus me-1"></i>Add New Branch</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive"> 
                            @include('yajra.datatable')
                        </div>
                    </div> 
                </div> 
            </div> 
        </div>
    </div> 
</div>

<div class="modal fade bd-example-modal-md" id="showBranchModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title " id="myLargeModalLabel">Branch Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>

            <div class="modal-body" id="dataBody">

            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
@include('yajra.js')
<script>
    function showBranchDetails(id) {
        $('#dataBody').empty().load('{{URL::to(Request()->route()->getPrefix()."/branch")}}/'+id);
        $('#showBranchModal').modal('show');
    }
</script>
@endsection