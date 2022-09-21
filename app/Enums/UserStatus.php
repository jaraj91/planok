<?php
namespace App\Enums;

use Illuminate\Support\Str;

enum UserStatus: string
{
    case Active = 'Activo';
    case Disabled = 'Desactivado';

    public function isActive()
    {
        return $this == self::Active;
    }

    public function isNotActive()
    {
        return ! $this->isActive();
    }

    public function label()
    {
        return match($this) {
            self::Active => Str::of(self::Active->value)->title(),
            self::Disabled => Str::of(self::Disabled->value)->title(),
        };
    }


}