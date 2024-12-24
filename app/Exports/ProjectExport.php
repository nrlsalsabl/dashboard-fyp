<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjectExport implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return Project::query();
    }

    public function map($intern): array
    {
        return [
            $intern->id,
            $intern->name,
            $intern->staff->name,
            $intern->brand->name,
            $intern->talent->name,
            $intern->agency->name,
            $intern->scope->name,
            $intern->quantity,
            $intern->rate_brand,
            $intern->rate_talent,
            $intern->tgl_pelunasan_talent,
            $intern->tgl_pelunasan_brand,
            $intern->Keterangan,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Project',
            'PIC',
            'Brand',
            'Talent',
            'Agency',
            'Scope',
            'Qty',
            'Rate Brand',
            'Rate Talent',
            'Tanggal Pelunasan Talent',
            'Tanggal Pelunasan Brand',
            'Keterangan',
        ];
    }
}
