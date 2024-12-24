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
    }
}
