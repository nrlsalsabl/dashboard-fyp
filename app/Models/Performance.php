<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->whereHas('intern', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });;
        });

        $query->when($filters['bulan'] ?? false, function ($query, $bulan) {
            $query->whereMonth('date', $bulan);
        });

        $query->when($filters['tahun'] ?? false, function ($query, $tahun) {
            $query->whereYear('date', $tahun);
        });
    }
}
