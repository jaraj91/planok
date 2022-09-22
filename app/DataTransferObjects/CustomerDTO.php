<?php

namespace App\DataTransferObjects;

use Illuminate\Support\Str;

class CustomerDTO
{
    public function __construct(
        private string $rut,
        private string $name,
        private int $phone,
        private string $email,
        private int $age,
        private string $sex,
        private string $region,
    ) {
    }

    public static function make(object $customerData)
    {
        return new self(
            rut: $customerData->rut,
            name: $customerData->nombre,
            phone: $customerData->telefono,
            email: $customerData->email,
            age: $customerData->edad,
            sex: $customerData->sexo,
            region: $customerData->region
        );
    }

    public function rut()
    {
        return Str::of($this->rut)->rut();
    }

    public function name()
    {
        return Str::of($this->name)->title();
    }

    public function phone()
    {
        return $this->phone;
    }

    public function email()
    {
        return Str::of($this->email)->lower();
    }

    public function age()
    {
        return $this->age;
    }

    public function sex()
    {
        return Str::of($this->sex)->title();
    }

    public function region()
    {
        return Str::of($this->region)->title();
    }
}
