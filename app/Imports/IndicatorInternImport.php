<?php

namespace App\Imports;

use App\Models\Intern;
use App\Models\Performance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class IndicatorInternImport implements ToModel, WithStartRow
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
        // Cari atau buat intern
        $intern = Intern::firstOrCreate(['name' => $row[1]]);

        return new Performance([
            'intern_id' => $intern->id,
            'date' =>  $row[2],
            'target' => $row[3],
            'result' => $row[4],
            'description' => $row[5],
        ]);
    }
}
