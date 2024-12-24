<?php

namespace App\Exports;

use App\Models\Performance;
use Maatwebsite\Excel\Concerns\FromCollection;

class IndicatorInternExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Performance::all();
    }
}
