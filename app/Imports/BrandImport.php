<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Staff;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BrandImport implements ToModel, WithStartRow
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
        $staff = Staff::firstOrCreate(['name' => $row[6]]);

        // Buat brand baru
        $brand = new Brand([
            'name' => $row[1],
            'email' => $row[2],
            'address' => $row[3],
            'phone' => $row[4],
            'staff_id' => $staff->id,
            'account_name' => $row[7],
            'account_number' => $row[8],
            'bank_name' => $row[9],
            'npwp' => $row[10],
            'nik' => $row[11],
        ]);

        // Simpan brand ke database
        $brand->save();

        // Simpan relasi ke tabel pivot (category_brand)
        $categories = array_unique(array_map('trim', explode(',', $row[5])));

        // Loop setiap kategori, cari atau buat, lalu hubungkan dengan brand
        foreach ($categories as $categoryName) {
            if (!empty($categoryName)) {
                $category = Category::firstOrCreate(['name' => $categoryName]);
                $brand->categories()->attach($category->id);
            }
        }

        return $brand;
    }
}
