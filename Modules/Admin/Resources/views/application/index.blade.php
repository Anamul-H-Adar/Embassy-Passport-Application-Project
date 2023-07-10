@extends('layouts.master')
@section('css')
@include('yajra.css')
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        @include('components.breadcrumb', ['item' => ['/dashboard'=>env('APP_NAME'),'active'=>'Applications'],
        'pTitle' => 'Applications List'])

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-xl-8">
                            </div>
                            <div class="col-xl-4">
                                <div class="text-xl-end mt-xl-0 mt-2">
                                    @can('application-create')
                                    <a href="{{route('applications.import')}}" class="btn btn-success mb-2 me-2" data-toggle="tooltip" title="Import Application"> <i class="mdi mdi-microsoft-excel me-1"></i>Import Application</a>
                                    <a href="{{route('applications.create')}}" class="btn btn-info mb-2 me-2" data-toggle="tooltip" title="Add New Application"> <i class="mdi mdi-plus me-1"></i>New Application</a>
                                    @endcan
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

<div class="modal fade bd-example-modal-md" id="showApplicationModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-info">
                <h4 class="modal-title " id="myLargeModalLabel">Applications Details</h4>
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
    function showApplicationDetails(id) {
        $('#dataBody').empty().load('{{URL::to(Request()->route()->getPrefix()."/applications")}}/'+id);
        $('#showApplicationModal').modal('show');
    }
</script>
@endsection
