<?php

namespace App\Exports;

use App\Models\Indicator;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IndicatorStaffExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Indicator::query();
    }

    public function map($indicator): array
    {
        return [
            $indicator->id,
            $indicator->staff->name,
            $indicator->staff->email,
            $indicator->staff->position->name,
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
            'Nama Karyawan',
            'Email Karyawan',
            'Posisi',
            'Bulan Tahun',
            'Target',
            'Capaian',
            'Justifikasi',
        ];
    }
}
