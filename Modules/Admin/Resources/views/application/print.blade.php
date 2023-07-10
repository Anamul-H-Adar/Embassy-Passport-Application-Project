<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

    <table id="customers">
        <tr>
            <div class="well">
                <ul class="list-unstyled mb0">
                    <li><strong>Serial No: </strong> #{{$application->serial_no}}</li>
                    <li><strong>Invoice Date:</strong> {{date('d-m-Y',strtotime($application->invoice_date))}}</li>
                    <li><strong>Submit Date:</strong> {{date('d-m-Y',strtotime($application->submit_date))}}</li>
                    <li><strong>Status:</strong> <span>{{ucwords($application->status)}}</span></li>
                </ul>
            </div>
        </tr>
        <tr>
            <td>R.F Embassy:</td>
            <td> {{date('d-M-Y',strtotime($application->rf_embassy))}}</td>
        </tr>
        
        
        <tr>
            <td>Recept No:</td>
            <td> {{$application->recept_no}}</td>
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
            <td>  {{isset($application->brance_name)?$application->brance_name:''}}</td>
        </tr>
        <tr>
            <td>Status:</td>
            <td><button class="btn btn-outline-primary btn-sm">{{ucwords($application->status)}}</button></td>
        </tr>
        <tr>
            <td>Remarks:</td>
            <td>{{$application->remarks}}</td>
        </tr>
    </table>

</body>
</html>
