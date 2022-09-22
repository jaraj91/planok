<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTransferObjects\UserDTO;
use App\DataTransferObjects\ProductDTO;
use App\DataTransferObjects\CustomerDTO;
use App\DataTransferObjects\QuotationDTO;

class QuotationController
{
    public function index(Request $request)
    {
        $quotations = DB::table('cotizacion As cot')
            ->select([
                'cot.idCotizacion',
                'cot.idCliente',
                'cot.idUsuario',
                'cli.nombre as cliente',
                'u.nombre as usuario_nombre',
                'u.apellido as usuario_apellido',
                'cot.subtotal',
                'cot.descuento',
                'cot.total',
                'cot.credito',
                'cot.montoCredito',
                'cot.estado',
                'cot.fechaCreacion',
                'fechaModificacion'
            ])
            ->leftJoin('usuario AS u', 'cot.idUsuario', '=', 'u.id')
            ->leftJoin('cliente AS cli', 'cot.idCliente', '=', 'cli.id')
            ->paginate(5)
            ->through(fn ($data) => QuotationDTO::make($data));

        return view('quotations.index', compact('quotations'));
    }

    public function show(Request $request, int $id)
    {
        $quotationData = DB::table('cotizacion')
            ->where('idCotizacion', '=', $id)
            ->first() ?? abort(404);

        $quotation =  QuotationDTO::make($quotationData);

        $customerData = DB::table('cliente')
            ->where('id', '=', $quotation->customerId())
            ->first();

        $customer = CustomerDTO::make($customerData);

        $userData = DB::table('usuario AS u')
            ->select('u.*', 'p.descripcion AS perfil')
            ->join('perfil AS p', 'u.idPerfil', '=', 'p.idPerfil')
            ->where('id', '=', $quotation->userId())
            ->first();

        $user = UserDTO::make($userData);

        $products = DB::table('cotizacion_producto AS cp')
            ->select('prod.*', 'tp.descripcion AS nombre')
            ->join('producto AS prod', 'cp.idProducto', '=', 'prod.idProducto')
            ->join('tipo_producto AS tp', 'prod.idTipoProducto', '=', 'tp.idTipoProducto')
            ->where('cp.idCotizacion', '=', $quotation->id())
            ->get()
            ->map(function ($data) {
                return ProductDTO::make($data);
            });

        return view('quotations.show', compact('quotation', 'customer', 'user', 'products'));
    }
}
