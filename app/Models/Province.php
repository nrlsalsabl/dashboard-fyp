<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AzisHapidin\IndoRegion\Traits\ProvinceTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Province Model.
 */
class Province extends Model
{
    use ProvinceTrait;
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'provinces';

    /**
     * Province has many regencies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }

    // Accessor
    protected function name(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                if ($value == 'DKI JAKARTA' || $value == 'DI YOGYAKARTA') {
                    // do ucwords(strtolower($value)) for the last word
                    $words = explode(' ', $value);
                    $lastWord = end($words);
                    $words[count($words) - 1] = ucwords(strtolower($lastWord));
                    return implode(' ', $words);
                } else {
                    return ucwords(strtolower($value));
                }
            }
        );
    }
}
