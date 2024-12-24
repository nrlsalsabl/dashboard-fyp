<?php

namespace App\Exports;

use App\Models\Earning;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EarningExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Earning::query();
    }

    public function map($earning): array
    {
        $talent_rate = $earning->sows->sum(function ($sow) use ($earning) {
            return $sow->pivot->talent_rate;
        });

        $profit = $earning->rate - $talent_rate;

        return [
            $earning->id,
            $earning->name,
            $earning->date,
            $earning->earnable_type == 'App\Models\Brand' ? 'Brand' : 'Agency',
            $earning->earnable->name,
            $earning->talent->name,
            $earning->sows->implode('name', ', '),
            $earning->rate,
            $talent_rate,
            $profit,
            $earning->status,
            $earning->link_project
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Pendapatan',
            'Tanggal',
            'Tipe',
            'PIC Project',
            'Talent',
            'SOW',
            'Rate',
            'Rate Talent',
            'Keuntungan',
            'Status',
            'Link Project'
        ];
    }
}
