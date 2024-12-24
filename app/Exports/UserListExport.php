<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserListExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return User::query();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            implode(" ", $user->getRoleNames()->toArray()),
            $user->status ? 'Aktif' : 'Tidak Aktif',
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama User',
            'Email',
            'Role',
            'Status',
        ];
    }
}
