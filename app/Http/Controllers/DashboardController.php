<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Actions\GetProductsCreatedBetweenDates;
use App\Actions\GetTotalAptsSoldByUserInSector;
use App\Actions\GetTotalSumOfSalesMadeInSector;
use App\Actions\GetCustomersHavePurchaseProductInSector;

class DashboardController
{
    public function index(Request $request)
    {
        $customersHavePurchaseParkingInSantiago = (new GetCustomersHavePurchaseProductInSector(
            productTypeId: 2, //Estacionamiento
            sector: 'Santiago',
        ))();

        $totalAptsSoldByPilarPinoInLasCondes = (new GetTotalAptsSoldByUserInSector(
            userId: 6, // Pilar Pino
            sector: 'Las Condes',
        ))();

        $productsCreatedBetweenDates = (new GetProductsCreatedBetweenDates(
            from: '2018-01-03',
            to: '2018-01-20',
        ))();

        $totalSumOfSalesMadeInSantiago = (new GetTotalSumOfSalesMadeInSector(
            sector: 'Santiago',
        ))();

        return view('dashboard', compact('customersHavePurchaseParkingInSantiago', 'totalAptsSoldByPilarPinoInLasCondes', 'productsCreatedBetweenDates', 'totalSumOfSalesMadeInSantiago'));
    }
}
