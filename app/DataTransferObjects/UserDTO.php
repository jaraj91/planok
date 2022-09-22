<?php

namespace App\DataTransferObjects;

use App\Enums\UserStatus;
use Illuminate\Support\Str;

class UserDTO
{
    public function __construct(
        private string $firstName,
        private string $lastName,
        private string $rut,
        private int $age,
        private string $sex,
        private string $email,
        private string $status,
        private string $profile,
    ) {
    }

    public static function make(object $userData)
    {
        return new self(
            firstName: $userData->nombre,
            lastName: $userData->apellido,
            rut: $userData->rut,
            age: $userData->edad,
            sex: $userData->sexo,
            email: $userData->correo,
            status: $userData->estado,
            profile: $userData->perfil,
        );
    }

    public function name()
    {
        return Str::of($this->firstName)
            ->append(' ')
            ->append($this->lastName)
            ->title();
    }

    public function rut()
    {
        return Str::of($this->rut)->rut();
    }

    public function age()
    {
        return $this->age;
    }

    public function sex()
    {
        return Str::of($this->sex)->title();
    }

    public function email()
    {
        return Str::of($this->email)->lower();
    }

    public function status()
    {
        return UserStatus::from($this->status);
    }

    public function profile()
    {
        return $this->profile;
    }
}
