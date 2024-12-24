<?php

namespace App\Imports;

use App\Models\Intern;
use Maatwebsite\Excel\Concerns\ToModel;

class InternImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Intern([
            'position_id' => $row[1],
            'email' => $row[2],
            'name' => $row[3],   
            'phone' => $row[4],
            'place' => $row[5],
            'birth' => $row[6],
            'address'=>$row[7],
            'domicile'=>$row[8],
            'instagram'=>$row[9],
            'linkedin'=>$row[10],
        ]);
    }
}
