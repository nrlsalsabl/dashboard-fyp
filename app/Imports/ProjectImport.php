<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Scope;
use App\Models\Staff;
use App\Models\Agency;
use App\Models\Talent;
use App\Models\Project;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProjectImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $staff = Staff::firstOrCreate(['name' => $row[3]]);
        $brand = Brand::firstOrCreate(['name' => $row[4]]);
        $talent = Talent::firstOrCreate(['name' => $row[5]]);
        $agency = Agency::firstOrCreate(['name' => $row[6]]);
        $scope = Scope::firstOrCreate(['name' => $row[7]]);
        
        return new Project([
            'name' => $row[2],
            'date' => $row[1],
            'staff_id' => $staff->id,
            'brand_id' => $brand->id,
            'talent_id' => $talent->id,
            'agency_id' => $agency->id,
            'scope_id' => $scope->id,
            'quantity' => $row[8],
            'rate_brand' => $row[9],
            'rate_talent' => $row[10],
            'tgl_pelunasan_talent' => $row[11],
            'tgl_pelunasan_brand' => $row[12],
            'Keterangan' => $row[13],
            'status' => $row[14],
            'link' => $row[15],
        ]);
    }
}
