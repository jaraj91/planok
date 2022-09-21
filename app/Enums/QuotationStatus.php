<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum QuotationStatus: string
{
    case Issued = 'EMITIDA';
    case Canceled = 'CANCELADA';

    public function isIssued()
    {
        return $this == self::Issued;
    }

    public function isNotIssued()
    {
        return ! $this->isIssued();
    }

    public function label()
    {
        return match($this) {
            self::Issued => Str::of(self::Issued->value)->title(),
            self::Canceled => Str::of(self::Canceled->value)->title(),
        };
    }
}
