<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
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

    public function earnings()
    {
        return $this->morphMany(Earning::class, 'earnable');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where(function($subquery) use ($search) {
                $subquery->where('name', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? null, function($query, $categories) {
            $query->whereHas('categories', function($query) use ($categories) {
                $query->whereIn('name', (array) $categories);
            });
        });
    }
}
