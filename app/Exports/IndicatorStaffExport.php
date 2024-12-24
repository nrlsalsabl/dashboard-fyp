<?php

namespace App\Exports;

use App\Models\Indicator;
use Maatwebsite\Excel\Concerns\FromCollection;

class IndicatorStaffExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Indicator::all();
    }
}
