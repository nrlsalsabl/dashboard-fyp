<?php

namespace App\Imports;

use App\Models\Staff;
use App\Models\Regency;
use App\Models\Position;
use App\Models\Province;
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
        $inputProvince = $row[12]; // Input dari user (provinsi)

        // Ambil id provinsi dari tabel provinces
        $existingProvince = Province::where('name', $inputProvince)->first();

        if (!$existingProvince) {
            throw new \Exception("Province not found: " . $inputProvince);
        }

        // Hapus awalan "KOTA" atau "KABUPATEN" dari inputName jika ada
        $cleanedInputName = preg_replace('/^(KOTA|KABUPATEN) /i', '', $inputName);

        // Cek apakah ada di database dengan atau tanpa "KOTA" atau "KABUPATEN"
        $existingRegency = Regency::whereRaw("REPLACE(REPLACE(name, 'KOTA ', ''), 'KABUPATEN ', '') = ?", [$cleanedInputName])
            ->where('province_id', $existingProvince->id)
            ->first();

        if ($existingRegency) {
            // Jika ditemukan di database, gunakan nama aslinya
            $finalName = $existingRegency->name;
        } else {
            // Jika tidak ditemukan, tambahkan "KOTA" atau "KABUPATEN" secara default
            // Misalnya, default "KABUPATEN" jika nama terdiri dari lebih dari satu kata
            if (Str::contains($cleanedInputName, [' '])) {
                $finalName = "KABUPATEN " . $cleanedInputName;
            } else {
                $finalName = "KOTA " . $cleanedInputName;
            }

            // Buat entri baru di database
            $existingRegency = Regency::create([
                'name' => $finalName,
                'province_id' => $existingProvince->id,
            ]);
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
