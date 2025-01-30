<?php

namespace App\Imports;

use App\Models\Position;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PositionImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!isset($row[1]) || empty(trim($row[1]))) {
            return null;
        }

        return new Position([
            'name' => $row[1],
        ]);
    }
}
