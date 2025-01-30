<?php

namespace App\Imports;

use App\Models\Staff;
use App\Models\Talent;
use App\Models\Regency;
use App\Models\Village;
use App\Models\Category;
use Illuminate\Support\Str;
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
        // Cari atau buat staff
        $staff = Staff::firstOrCreate(['name' => $row[24]]);

        // Cari atau buat provinsi (domicile)
        $inputName = $row[6]; // Input dari user (tanpa "KOTA" atau "KABUPATEN")

        // Cek apakah ada di database dengan atau tanpa "KOTA" atau "KABUPATEN"
        $existingRegency = Regency::whereRaw("REPLACE(REPLACE(name, 'KOTA ', ''), 'KABUPATEN ', '') = ?", [$inputName])
                        ->first();

        if ($existingRegency) {
            // Jika ditemukan di database, gunakan nama aslinya
            $finalName = $existingRegency->name;
        } else {
            // Jika tidak ditemukan, tambahkan "KOTA" atau "KABUPATEN" secara default
            // Misalnya, default "KABUPATEN" jika nama terdiri dari lebih dari satu kata
            if (Str::contains($inputName, [' '])) {
                $finalName = "KABUPATEN " . $inputName;
            } else {
                $finalName = "KOTA " . $inputName;
            }

            // Buat entri baru di database
            $existingRegency = Regency::firstOrCreate(['name' => $finalName]);
        }

        $talentExclusive = $row[23] == 1 ? true : false;
        $shopeeAffiliate = $row[30] == 1 ? true : false;
        $tiktokAffiliate = $row[31] == 1 ? true : false;
        $mcnTiktok = $row[32] == 1 ? true : false;
        $status = $row[33] == 1 ? true : false;

        // Buat talent
        $talent = new Talent([
            'name' => $row[1],
            'email' => $row[2],
            'phone' => $row[3],
            'place' => $row[4],
            'date' => $row[5],
            'regency_id' => $existingRegency->id,
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
            'talent_exclusive' => $talentExclusive,
            'staff_id' => $staff->id,
            'account_name' => $row[25],
            'account_number' => $row[26],
            'bank_name' => $row[27],
            'npwp' => $row[28],
            'nik' => $row[29],
            'shopee_affiliate' => $shopeeAffiliate,
            'tiktok_affiliate' => $tiktokAffiliate,
            'mcn_tiktok' => $mcnTiktok,
            'status' => $status,
        ]);

        // Simpan talent ke database
        $talent->save();

        // Simpan relasi ke tabel pivot (category_talent)
        $categories = array_unique(array_map('trim', explode(',', $row[7])));

        // Loop setiap kategori, cari atau buat, lalu hubungkan dengan talent
        foreach ($categories as $categoryName) {
            if (!empty($categoryName)) {
                $category = Category::firstOrCreate(['name' => $categoryName]);
                $talent->categories()->attach($category->id);
            }
        }

        return $talent;
    }
}