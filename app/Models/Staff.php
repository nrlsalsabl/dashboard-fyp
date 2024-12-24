<?php

namespace App\Models;

use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function talents()
    {
        return $this->hasMany(Talent::class);
    }

    public function indicator()
    {
        return $this->hasMany(Indicator::class);
    }

    public function finance()
    {
        return $this->hasMany(Earning::class);
    }

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

    public function agency()
    {
        return $this->hasMany(Agency::class);
    }

    public function spend()
    {
        return $this->hasMany(Spending::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });

        $query->when($filters['position'] ?? null, function ($query, $position) {
            $query->whereHas('position', function ($query) use ($position) {
                $query->where('name', $position);
            });
        });

        $query->when($filters['bulan'] ?? false, function ($query, $bulan) {
            $query->whereMonth('birth', $bulan);
        });

        $query->when(isset($filters['status']) && $filters['status'] !== '', function ($query) use ($filters) {
            $query->where('status', $filters['status']);
        });
    }
}
