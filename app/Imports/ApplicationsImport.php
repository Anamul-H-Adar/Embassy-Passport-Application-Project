<?php

namespace App\Imports;

use App\Models\Applications;
use Maatwebsite\Excel\Concerns\ToModel;

class ApplicationsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Applications([
            'rf_embassy' => $row['rf_embassy'],
            'submit_date' => $row['submit_date'],
            'serial_no' => $row['serial_no'],
            'invoice_date' => $row['invoice_date'],
            'name' => $row['name'],
            'old_mrp_no' => $row['old_mrp_no'],
            'new_mrp_no' => $row['new_mrp_no'],
            'enrollment_no' => $row['enrollment_no'],
            'mobile_no' => $row['mobile_no'],
            'branch_id' => $row['branch_id'],
            'remarks' => $row['remarks'],
            'status' => $row['status'],
        ]);
    }
}
