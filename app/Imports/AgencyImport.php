<?php

namespace App\Imports;

use App\Models\Staff;
use App\Models\Agency;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AgencyImport implements ToModel, WithStartRow
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
        $staff = Staff::firstOrCreate(['name' => $row[5]]);

        return new Agency([
            'name' => $row[1],
            'email' => $row[2],
            'address' => $row[3],
            'phone' => $row[4],
            'staff_id' => $staff->id,            
        ]);
    }
}
