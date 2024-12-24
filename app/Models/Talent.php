<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Talent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function earning()
    {
        return $this->hasMany(Earning::class);
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

        $query->when($filters['category'] ?? null, function($query, $categories) {
            $query->whereHas('categories', function($query) use ($categories) {
                $query->whereIn('name', (array) $categories);
            });
        });

        $query->when($filters['bulan'] ?? false, function ($query, $bulan) {
            $query->whereMonth('date', $bulan);
        });

        $query->when(isset($filters['mcn']) && $filters['mcn'] !== '', function ($query) use ($filters) {
            $query->where('mcn_tiktok', $filters['mcn']);
        });

        $query->when($filters['staff'] ?? false, function ($query, $staff) {
            $query->where('staff_id', $staff);
        });
    }
}
