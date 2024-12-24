<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });
    
        $query->when($filters['bulan'] ?? false, function ($query, $bulan) {
            $query->whereMonth('date', $bulan);
        });
    
        $query->when($filters['tahun'] ?? false, function ($query, $tahun) {
            $query->whereYear('date', $tahun);
        });

        $query->when($filters['status'] ?? false, function ($query, $status){
            $query->where('spendings.status', $status);   
        });
    }
}
