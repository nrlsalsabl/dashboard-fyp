<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CategoryExport implements FromQuery, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Category::query();
    }

    public function map($category): array
    {
        return [
            $category->id,
            $category->name,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Kategori',
        ];
    }
}
