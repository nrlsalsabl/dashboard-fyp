<?php

namespace App\Imports;

use App\Models\Talent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TalentImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2; // Mulai dari baris kedua (melewati heading)
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Talent([
            // 'id' => $row[0], tidak perlu
            'name' => $row[1],
            'email' => $row[2],
            'phone' => $row[3],
            'place' => $row[4],
            'date' => $row[5],
            'engagement' => $row[6],
            'instagram' => $row[7],
            'finstagram' => $row[8],
            'rate_igs' => $row[9],
            'rate_igf' => $row[10],
            'rate_igr' => $row[11],
            'rate_igl' => $row[12],
            'tiktok' => $row[13],
            'ftiktok' => $row[14],
            'rate_ttf' => $row[15],
            'rate_ttl' => $row[16],
            'youtube' => $row[17],
            'syoutube' => $row[18],
            'rate_yt' => $row[19],
            'rate_event' => $row[20],
            'talent_exclusive' => $row[21],
            'account_name' => $row[22],
            'account_number' => $row[23],
            'bank_name' => $row[24],
            'npwp' => $row[25],
            'nik' => $row[26],
            'shopee_affiliate' => $row[27],
            'tiktok_affiliate' => $row[28],
            'mcn_tiktok' => $row[29],
            'status' => $row[30],
        ]);
    }
}
