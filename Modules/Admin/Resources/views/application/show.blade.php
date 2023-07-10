<div class="form-group row">
    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover">

            <tbody>
                
                
                <tr>
                    <td>R.F Embassy:</td>
                    <td> {{date('d-M-Y',strtotime($application->rf_embassy))}}</td>
                </tr>
                <tr>
                    <td>Submit Date:</td>
                    <td>  {{date('d-M-Y',strtotime($application->submit_date))}}</td>
                </tr>
                <tr>
                    <td>Submit Serial No:</td>
                    <td> {{$application->serial_no}}</td>
                </tr>
                <tr>
                    <td>Recept No:</td>
                    <td> {{$application->recept_no}}</td>
                </tr>
                <tr>
                    <td>Invoice Date:</td>
                    <td>  {{date('d-M-Y',strtotime($application->invoice_date))}}</td>
                </tr>
                <tr>
                    <td> Name:</td>
                    <td>  {{$application->name}}</td>
                </tr>
                
                <tr>
                    <td>Old MRP No:</td>
                    <td>  {{$application->old_mrp_no}}</td>
                </tr>
                <tr>
                    <td>New MRP No:</td>
                    <td>  {{$application->new_mrp_no}}</td>
                </tr>
                <tr>
                    <td>Enrollment No:</td>
                    <td>  {{$application->enrollment_no}}</td>
                </tr>
                <tr>
                    <td>Mobile No:</td>
                    <td>  {{$application->mobile_no}}</td>
                </tr>
                <tr>
                    <td>Branch:</td>
                    <td>  {{isset($application->branch_name)?$application->branch_name:''}}</td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><button class="btn btn-outline-primary btn-sm">{{ucwords($application->status)}}</button></td>
                </tr>
                <tr>
                    <td>Remarks:</td>
                    <td>{{$application->remarks}}</td>
                </tr>
                <a href="{{ 'applications/print/'.$application->id}}"><button class="btn btn-outline-primary btn-sm">PDF</button></a>
            </tbody>
        </table>
    </div>
</div>
