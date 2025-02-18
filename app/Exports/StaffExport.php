<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StaffExport implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return Staff::query();
    }

    public function map($staff): array
    {
        return [
            $staff->id,
            $staff->name,
            $staff->email,
            $staff->address,
            $staff->position->name,
            $staff->phone,
            $staff->place,
            $staff->birth,
            $staff->regency->name ?? '',
            $staff->instagram,
            $staff->linkedin,
            $staff->status ? 'Aktif' : 'Tidak Aktif',
            $staff->regency->province->name ?? ''
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Karyawan',
            'Email',
            'Alamat',
            'Posisi',
            'Nomor HP',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Domisili',
            'Instagram',
            'Linkedin',
            'Status',
            'Provinsi'
        ];
    }
}
