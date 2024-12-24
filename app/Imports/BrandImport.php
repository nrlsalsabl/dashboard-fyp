<?php

namespace App\Imports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BrandImport implements ToModel, WithStartRow
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
        return new Brand([
            'name' => $row[1],
            'email' => $row[2],
            'address' => $row[3],
            'phone' => $row[4],
            'account_name' => $row[5],
            'account_number' => $row[6],
            'bank_name' => $row[7],
            'npwp' => $row[8],
            'nik' => $row[9],
        ]);
    }
}
