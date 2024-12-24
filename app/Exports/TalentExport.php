<?php

namespace App\Exports;

use App\Models\Talent;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class TalentExport extends DefaultValueBinder implements FromQuery, WithHeadings, WithMapping, WithCustomValueBinder
{
    public function bindValue(Cell $cell, $value)
    {
        if ($cell->getColumn() === 'AA' || $cell->getColumn() === 'AD') {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Talent::query();
    }

    public function map($talent): array
    {
        return [
            $talent->id,
            $talent->name,
            $talent->email,
            $talent->phone,
            $talent->place,
            $talent->date,
            $talent->village?->province?->name,
            $talent->categories->implode('name', ', '),
            $talent->engagement,
            $talent->instagram,
            $talent->finstagram == 0 ? '0' : $talent->finstagram,
            $talent->rate_igs,
            $talent->rate_igf,
            $talent->rate_igr,
            $talent->rate_igl,
            $talent->tiktok,
            $talent->ftiktok == 0 ? '0' : $talent->ftiktok,
            $talent->rate_ttf,
            $talent->rate_ttl,
            $talent->youtube,
            $talent->syoutube == 0 ? '0' : $talent->syoutube,
            $talent->rate_yt,
            $talent->rate_event,
            $talent->talent_exclusive ? 'Ya' : 'Tidak',
            $talent->staff?->name,
            $talent->account_name,
            $talent->account_number,
            $talent->bank_name,
            $talent->npwp,
            $talent->nik,
            $talent->shopee_affiliate ? 'Ya' : 'Tidak',
            $talent->tiktok_affiliate ? 'Ya' : 'Tidak',
            $talent->mcn_tiktok ? 'Ya' : 'Tidak',
            $talent->status ? 'Aktif' : 'Tidak Aktif'
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Talent',
            'Email',
            'Nomor HP',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Domisili',
            'Kategori',
            'Engagement Rate',
            'Instagram',
            'Instagram Followers',
            'Rate Instagram Story',
            'Rate Instagram Feed',
            'Rate Instagram Reels',
            'Rate Instagram Live',
            'Tiktok',
            'Tiktok Followers',
            'Rate Tiktok Feed',
            'Rate Tiktok Live',
            'Youtube',
            'Youtube Subscribers',
            'Rate Youtube',
            'Rate Event Attendance',
            'Talent Exclusive',
            'PIC',
            'Nama Penerima Rekening',
            'No Rekening', // AA
            'Nama Bank',
            'NPWP',
            'NIK', // AD
            'Shopee Affiliate',
            'Tiktok Affiliate',
            'MCN TIKTOK',
            'Status'
        ];
    }
}
