<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sow extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function earnings()
    {
        return $this->belongsToMany(Earning::class, 'earning_sow')->withPivot(['talent_rate', 'note'])->withTimestamps();
    }
}
