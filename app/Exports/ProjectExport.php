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

    public function map($project): array
    {
        return [
            $project->id,
            $project->date,
            $project->name,
            $project->staff?->name,
            $project->brand->name,
            $project->talent->name,
            $project->agency->name,
            $project->scope->name,
            $project->quantity,
            $project->rate_brand,
            $project->rate_talent,
            $project->tgl_pelunasan_talent,
            $project->tgl_pelunasan_brand,
            $project->Keterangan,
            $project->status,
            $project->link,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tanggal Pembuatan',
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
            'Status',
            'Link Project',
        ];
    }
}
