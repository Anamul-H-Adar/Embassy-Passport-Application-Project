<?php

namespace App\Exports;

use App\Models\Applications;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApplicationsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Applications::all();
    }
}
