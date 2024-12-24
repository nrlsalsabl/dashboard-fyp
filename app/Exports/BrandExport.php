<?php

namespace App\Exports;

use App\Models\Brand;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class BrandExport extends DefaultValueBinder implements FromQuery, WithHeadings, WithMapping, WithCustomValueBinder
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Brand::query();
    }

    public function map($brand): array
    {
        return [
            $brand->id,
            $brand->name,
            $brand->email,
            $brand->address,
            $brand->phone,
            $brand->categories->implode('name', ', '),
            $brand->staff?->name,
            $brand->account_name,
            $brand->account_number,
            $brand->bank_name,
            $brand->npwp,
            $brand->nik,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Brand',
            'Email',
            'Alamat',
            'Nomor HP',
            'Kategori',
            'PIC',
            'Nama Penerima Rekening',
            'No Rekening', // I 
            'Nama Bank',
            'NPWP',
            'NIK', // L
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        // Check if cell in column then set value as string
        if ($cell->getColumn() === 'I' || $cell->getColumn() === 'L') {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }
}
