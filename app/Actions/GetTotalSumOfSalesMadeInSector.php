<?php

namespace App\Actions;

use App\Enums\ProductStatus;
use Illuminate\Support\Facades\DB;

class GetTotalSumOfSalesMadeInSector
{
    public function __construct(private string $sector)
    {
    }

    public function __invoke()
    {
        return DB::table('producto AS prod')
            ->selectRaw('SUM(prod.valorLista) as sum_total')
            ->where('prod.estado', '=', ProductStatus::Sold->value)
            ->where('sector', '=', 'Santiago')
            ->value('sum_total');
    }
}
