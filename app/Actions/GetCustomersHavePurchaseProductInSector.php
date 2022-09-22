<?php

namespace App\Actions;

use App\DataTransferObjects\CustomerDTO;
use App\Enums\ProductStatus;
use Illuminate\Support\Facades\DB;

class GetCustomersHavePurchaseProductInSector
{
    public function __construct(
        private int $productTypeId,
        private string $sector,
    ) {
    }

    public function __invoke()
    {
        return DB::table('cliente AS cli')
            ->select('cli.rut', 'cli.nombre', 'cli.telefono', 'cli.email', 'cli.edad', 'cli.sexo', 'cli.region')
            ->join('cotizacion AS cot', 'cli.id', '=', 'cot.idCliente')
            ->join('cotizacion_producto AS cp', 'cot.idCotizacion', '=', 'cp.idCotizacion')
            ->join('producto AS prod', 'cp.idProducto', '=', 'prod.idProducto')
            ->where('prod.sector', '=', $this->sector)
            ->where('prod.estado', '=', ProductStatus::Sold->value)
            ->where('prod.idTipoProducto', '=', $this->productTypeId)
            ->get()
            ->map(fn ($data) => CustomerDTO::make($data));
    }
}
