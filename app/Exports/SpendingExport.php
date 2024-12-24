<?php

namespace App\Exports;

use App\Models\Spending;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SpendingExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Spending::query();
    }

    public function map($spending): array
    {
        return [
            $spending->id,
            $spending->staff->name,
            $spending->date,
            $spending->requirement,
            $spending->budget,
            $spending->status,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Karyawan',
            'Tanggal',
            'Kebutuhan',
            'Budget',
            'Status'
        ];
    }
}
