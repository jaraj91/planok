<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\QuotationDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationController
{
    public function index(Request $request)
    {
        $quotations = DB::table('cotizacion As cot')
            ->select('cot.idCotizacion', 'cli.nombre as cliente', 'u.nombre as usuario_nombre', 'u.apellido as usuario_apellido', 'cot.subtotal', 'cot.descuento', 'cot.total', 'cot.credito', 'cot.montoCredito', 'cot.estado', 'cot.fechaCreacion', 'fechaModificacion')
            ->leftJoin('usuario AS u', 'cot.idUsuario', '=', 'u.id')
            ->leftJoin('cliente AS cli', 'cot.idCliente', '=', 'cli.id')
            ->paginate(5)
            ->through(function(object $data) {
                return new QuotationDTO(
                    id: $data->idCotizacion,
                    customer: $data->cliente,
                    userFirstName: $data->usuario_nombre,
                    userLastName: $data->usuario_apellido,
                    subTotal: $data->subtotal,
                    discount: $data->descuento,
                    total: $data->total,
                    credit: $data->credito,
                    creditAmount: $data->montoCredito,
                    status: $data->estado,
                    createdAt: $data->fechaCreacion,
                    updatedAt: $data->fechaModificacion,
                );
            });

        return view('quotations', compact('quotations'));
    }
}
