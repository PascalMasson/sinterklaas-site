<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class ReadableNumberCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return number_format($value, 2, ',', '.');
    }

    public function set($model, $key, $value, $attributes)
    {
        return str_replace(" ", "", str_replace(",", ".", $value));
    }
}
