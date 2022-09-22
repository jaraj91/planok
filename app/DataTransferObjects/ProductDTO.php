<?php

namespace App\DataTransferObjects;

use Illuminate\Support\Str;
use App\Enums\ProductStatus;
use Illuminate\Support\Carbon;

class ProductDTO
{
    public function __construct(
        private string $name,
        private string $description,
        private float $listValue,
        private string $orientation,
        private string $floor,
        private float $surface,
        private string $status,
        private string $createdAt,
        private string $updatedAt,
        private string $sector,
    ) {
    }

    public static function make(object $productData)
    {
        return new self(
            name: $productData->nombre,
            description: $productData->descripcion,
            listValue: $productData->valorLista,
            orientation: $productData->orientacion,
            floor: $productData->piso,
            surface: $productData->superficie,
            status: $productData->estado,
            createdAt: $productData->fechaCreacion,
            updatedAt: $productData->fechaEdicion,
            sector: $productData->sector,
        );
    }

    public function name()
    {
        return Str::of($this->name)->title();
    }

    public function description()
    {
        return $this->description;
    }

    public function listValue()
    {
        return Str::of($this->listValue)->currency();
    }

    public function orientation()
    {
        return Str::of($this->orientation)->upper();
    }

    public function floor()
    {
        return $this->floor;
    }

    public function surface()
    {
        return Str::of($this->floor)->currency('');
    }

    public function status()
    {
        return ProductStatus::from($this->status);
    }

    public function createdAt()
    {
        return Carbon::make($this->createdAt)->format('d-m-Y');
    }

    public function updatedAt()
    {
        return Carbon::make($this->updatedAt)->format('d-m-Y');
    }

    public function sector()
    {
        return $this->sector;
    }
}
