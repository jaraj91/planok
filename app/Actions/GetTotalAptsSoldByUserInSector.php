<?php

namespace App\Actions;

use App\Enums\ProductStatus;
use Illuminate\Support\Facades\DB;

class GetTotalAptsSoldByUserInSector
{
    public function __construct(
        private int $userId,
        private string $sector,
    ) {
    }

    public function __invoke(): int
    {
        return DB::table('cotizacion AS cot')
            ->selectRaw('COUNT(*) AS total')
            ->join('cotizacion_producto AS cp', 'cot.idCotizacion', '=', 'cp.idCotizacion')
            ->join('producto AS prod', function ($join) {
                $join->on('cp.idProducto', '=', 'prod.idProducto')
                    ->where('prod.estado', '=', ProductStatus::Sold->value)
                    ->where('prod.idTipoProducto', '=', 1)
                    ->where('prod.sector', $this->sector);
            })
            ->where('cot.idUsuario', '=', $this->userId)
            ->value('total');
    }
}
