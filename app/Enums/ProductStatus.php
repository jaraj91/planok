<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum ProductStatus: string
{
    case Available = 'DISPONIBLE';
    case Sold = 'VENDIDO';

    public function isAvailable()
    {
        return $this == self::Available;
    }

    public function isNotAvailable()
    {
        return ! $this->isAvailable();
    }

    public function label()
    {
        return match($this) {
            self::Available => Str::of(self::Available->value)->title(),
            self::Sold => Str::of(self::Sold->value)->title(),
        };
    } 
}
