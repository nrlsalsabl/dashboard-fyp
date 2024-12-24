<?php

namespace App\Exports;

use App\Models\Intern;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InternExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Intern::query();
    }

    public function map($intern): array
    {
        return [
            $intern->id,
            $intern->name,
            $intern->email,
            $intern->address,
            $intern->position->name,
            $intern->phone,
            $intern->place,
            $intern->birth,
            $intern->village->province->name,
            $intern->instagram,
            $intern->linkedin,
            $intern->status ? 'Aktif' : 'Tidak Aktif'
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Intern',
            'Email',
            'Alamat',
            'Posisi',
            'Nomor HP',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Domisili',
            'Instagram',
            'Linkedin',
            'Status'
        ];
    }
}
