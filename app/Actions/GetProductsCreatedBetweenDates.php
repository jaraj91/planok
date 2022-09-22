<?php

namespace App\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\DataTransferObjects\ProductDTO;

class GetProductsCreatedBetweenDates
{
    private Carbon $from;
    private Carbon $to;

    public function __construct(string $from, string $to)
    {
        $this->from = Carbon::make($from)->startOfDay();
        $this->to = Carbon::make($to)->endOfDay();
    }

    public function __invoke()
    {
        return DB::table('producto AS prod')
            ->select('tp.descripcion AS nombre', 'prod.descripcion', 'prod.valorLista', 'prod.orientacion', 'prod.piso', 'prod.superficie', 'prod.estado', 'prod.fechaCreacion', 'prod.fechaEdicion', 'prod.sector')
            ->leftJoin('tipo_producto AS tp', 'prod.idTipoProducto', '=', 'tp.IdTipoProducto')
            ->whereBetween('prod.fechaCreacion', [$this->from, $this->to])
            ->paginate(5)
            ->through(fn ($data) => ProductDTO::make($data));
    }
}
