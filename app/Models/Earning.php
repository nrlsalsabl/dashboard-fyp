<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['date'];

    public function earnable()
    {
        return $this->morphTo();
    }

    public function sows()
    {
        return $this->belongsToMany(Sow::class, 'earning_sow')->withPivot(['talent_rate', 'note'])->withTimestamps();
    }

    public function talent()
    {
        return $this->belongsTo(Talent::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });
    
        $query->when($filters['talent'] ?? false, function ($query, $talen) {
            $query->where('talent_id', $talen);
        });

        $query->when($filters['bulan'] ?? false, function ($query, $bulan) {
            $query->whereMonth('date', $bulan);
        });
    
        $query->when($filters['tahun'] ?? false, function ($query, $tahun) {
            $query->whereYear('date', $tahun);
        });

        $query->when($filters['tipe'] ?? false, function ($query, $tipe) {
            switch ($tipe) {
                case 'Brand':
                    $tipe = 'App\Models\Brand';
                    break;
                case 'Agency':
                    $tipe = 'App\Models\Agency';
                    break;
            }
            $query->where('earnable_type', $tipe);
        });

        $query->when($filters['status'] ?? false, function ($query, $status){
            $query->where('status', $status);   
        });
    }
}
