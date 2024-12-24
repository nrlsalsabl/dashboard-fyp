<?php

namespace App\Models;

use App\Models\Position;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Intern extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function perform()
    {
        return $this->hasMany(Performance::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });

        $query->when($filters['position'] ?? null, function($query, $position) {
            $query->whereHas('position', function($query) use ($position) {
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
