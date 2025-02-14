<?php

namespace App\Imports;

use App\Models\Staff;
use App\Models\Regency;
use App\Models\Position;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StaffImport implements ToModel, WithStartRow
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
        $position = Position::firstOrCreate(['name' => $row[4]]);
        $status = $row[11] == 'Aktif' ? true : false;

        // Cari atau buat provinsi (domicile)
        $inputName = $row[8]; // Input dari user (tanpa "KOTA" atau "KABUPATEN")

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

        return new Staff([
            'name' => $row[1],
            'email' => $row[2],
            'address' => $row[3],
            'position_id' => $position->id,
            'phone' => $row[5],
            'place' => $row[6],
            'birth' => $row[7],
            'regency_id' => $existingRegency->id,
            'instagram' => $row[9],
            'linkedin' => $row[10],
            'status' => $status,
        ]);
    }
}
