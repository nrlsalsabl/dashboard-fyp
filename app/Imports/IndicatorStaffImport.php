<?php

namespace App\Imports;

use App\Models\Staff;
use App\Models\Indicator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class IndicatorStaffImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Mulai dari baris kedua (melewati heading)
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Cari atau buat staff
        $staff = Staff::firstOrCreate(['name' => $row[1]]);

        return new Indicator([
            'staff_id' => $staff->id,
            'date' =>  $row[2],
            'target' => $row[3],
            'result' => $row[4],
            'description' => $row[5],
        ]);
    }
}
