<?php

namespace App\Exports;

use App\Models\Agency;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AgencyExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Agency::query();
    }

    public function map($agency): array
    {
        return [
            $agency->id,
            $agency->name,
            $agency->email,
            $agency->address,
            $agency->phone,
            $agency->staff->name
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Agensi',
            'Email',
            'Alamat',
            'Nomor HP',
            'PIC'
        ];
    }
}
