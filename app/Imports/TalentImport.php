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
            'domicile' => $row[6],
            'category' => $row[7],
            'engagement' => $row[8],
            'instagram' => $row[9],
            'finstagram' => $row[10],
            'rate_igs' => $row[11],
            'rate_igf' => $row[12],
            'rate_igr' => $row[13],
            'rate_igl' => $row[14],
            'tiktok' => $row[15],
            'ftiktok' => $row[16],
            'rate_ttf' => $row[17],
            'rate_ttl' => $row[18],
            'youtube' => $row[19],
            'syoutube' => $row[20],
            'rate_yt' => $row[21],
            'rate_event' => $row[22],
            'talent_exclusive' => $row[23],
            'pic' => $row[24],
            'account_name' => $row[25],
            'account_number' => $row[26],
            'bank_name' => $row[27],
            'npwp' => $row[28],
            'nik' => $row[29],
            'shopee_affiliate' => $row[30],
            'tiktok_affiliate' => $row[31],
            'mcn_tiktok' => $row[32],
            'status' => $row[33],
        ]);
    }
}
