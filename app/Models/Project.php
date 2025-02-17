<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function talent()
    {
        return $this->belongsTo(Talent::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function scope()
    {
        return $this->belongsTo(Scope::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($subquery) use ($search) {
                $subquery->where('name', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['talent'] ?? false, function ($query, $talent) {
            $query->where('talent_id', $talent);
        });

        $query->when($filters['bulan'] ?? false, function ($query, $bulan) {
            $query->whereMonth('tgl_pelunasan_brand', $bulan);
        });

        $query->when($filters['tahun'] ?? false, function ($query, $tahun) {
            $query->whereYear('tgl_pelunasan_brand', $tahun);
        });

        $query->when($filters['staff'] ?? false, function ($query, $staff) {
            $query->where('staff_id', $staff);
        });

        $query->when($filters['brand'] ?? false, function ($query, $brand) {
            $query->where('brand_id', $brand);
        });

        $query->when($filters['link'] ?? false, function ($query, $link) {
            $query->where('link', 'like', '%' . $link . '%');
        });
    }
}
