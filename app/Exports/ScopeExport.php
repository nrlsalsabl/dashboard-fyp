<?php

namespace App\Exports;

use App\Models\Scope;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScopeExport implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return Scope::query();
    }
    public function map($scope): array
    {
        return [
            $scope->id,
            $scope->name,

        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Scope',

        ];
    }
}
