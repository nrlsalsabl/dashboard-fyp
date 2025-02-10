<?php

namespace App\Exports;

use App\Models\Talent;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class TalentExport extends DefaultValueBinder implements FromQuery, WithHeadings, WithMapping, WithCustomValueBinder
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function query()
    {
        return Talent::query()
            ->when($this->filters['search'] ?? null, function ($query, $search) {
                $query->where('name', 'like', "%$search%");
            })
            ->when($this->filters['category'] ?? null, function ($query, $category) {
                $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('name', $category);
                });
            })
            ->when($this->filters['mcn'] ?? null, function ($query, $mcn) {
                $query->where('mcn_tiktok', $mcn);
            })
            ->when($this->filters['staff'] ?? null, function ($query, $staff) {
                $query->where('staff_id', $staff);
            })
            ->when($this->filters['bulan'] ?? null, function ($query, $bulan) {
                $query->whereMonth('date', $bulan);
            });
    }

    public function map($talent): array
    {
        static $index = 1;
        return [
            $index++,
            $talent->name,
            $talent->email,
            $talent->phone,
            $talent->place,
            $talent->date,
            $talent->village ? $talent->village?->province?->name : $talent->domicile,
            $talent->categories->isNotEmpty() ? $talent->categories->implode('name', ', ') : $talent->category,
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
            $talent->staff ? $talent->staff?->name : $talent->pic,
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
            'No Rekening',
            'Nama Bank',
            'NPWP',
            'NIK',
            'Shopee Affiliate',
            'Tiktok Affiliate',
            'MCN TIKTOK',
            'Status'
        ];
    }
}
