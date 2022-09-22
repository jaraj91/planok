<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot>
    <div>
        <x-customers :customers="$customersHavePurchaseParkingInSantiago" />

        <dl class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-2">
            <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Total dptos. vendidos por Pilar Pino en Las Condes</dt>
                <dd class="flex items-center gap-4 mt-1 text-3xl font-semibold tracking-tight text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-orange-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                    </svg>
                    <span>{{ $totalAptsSoldByPilarPinoInLasCondes }}</span>
                </dd>
            </div>
            <div class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Total de ventas realizadas en Santiago</dt>
                <dd class="flex items-center gap-4 mt-1 text-3xl font-semibold tracking-tight text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-orange-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                    <span>{{ Str::currency($totalSumOfSalesMadeInSantiago) }}</span>
                </dd>
            </div>
        </dl>

        <x-products :products="$productsCreatedBetweenDates" />
    </div>
</x-layout>
