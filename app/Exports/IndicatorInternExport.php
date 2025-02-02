<?php

namespace App\Exports;

use App\Models\Performance;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IndicatorInternExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Performance::query();
    }

    public function map($indicator): array
    {
        return [
            $indicator->id,
            $indicator->intern->name,
            $indicator->intern->email,
            $indicator->intern->position->name,
            $indicator->date,
            $indicator->target,
            $indicator->result,
            $indicator->description,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Intern',
            'Email Intern',
            'Posisi',
            'Bulan Tahun',
            'Target',
            'Capaian',
            'Justifikasi',
        ];
    }
}
