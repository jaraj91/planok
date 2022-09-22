<x-layout>
    <x-slot:title>Cotizaciones</x-slot:title>
    <div class="overflow-hidden overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Cliente</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Usuario</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Sub Total</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Descuento</th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Total</th>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Crédito</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Monto Crédito</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Estado</th>
                    <th scope="col" class="table-cell px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:hidden">Fechas</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Fecha Creación</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Fecha Modificación</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($quotations as $quotation)
                <tr>
                    <td class="px-3 py-4 text-sm text-gray-500">{{ $quotation->customer() }}</td>
                    <td class="px-3 py-4 text-sm text-gray-500">{{ $quotation->user() }}</td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $quotation->subTotal() }}</td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $quotation->discount() }}</td>
                    <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                        <dl class="font-normal lg:hidden">
                            <dt>Sub Total</dt>
                            <dd class="text-gray-700 truncate">{{ $quotation->subTotal() }}</dd>
                            <dt>Descuento</dt>
                            <dd class="text-gray-700 truncate">{{ $quotation->discount() }}</dd>
                        </dl>
                        <span class="lg:hidden">Total<br /></span>
                        {{ $quotation->total() }}
                    </td>
                    <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6">
                        <dl class="font-normal lg:hidden">
                            <dt>Monto</dt>
                            <dd class="text-gray-700 truncate">{{ $quotation->creditAmount() }}</dd>
                        </dl>
                        <span class="lg:hidden">Crédito<br /></span>
                        {{ $quotation->credit() }}
                    </td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $quotation->creditAmount() }}</td>
                    <td class="px-3 py-4">
                        <span
                            @class([
                                'inline-flex',
                                'px-2',
                                'text-xs',
                                'font-semibold',
                                'leading-5',
                                'text-green-800' => $quotation->status()->isIssued(),
                                'text-gray-800' => $quotation->status()->isNotIssued(),
                                'bg-green-100' => $quotation->status()->isIssued(),
                                'bg-gray-100' => $quotation->status()->isNotIssued(),
                                'rounded-full',
                            ])
                        >
                            {{ $quotation->status()->label() }}
                        </span>
                    </td>
                    <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:w-auto sm:max-w-none sm:pl-6 lg:hidden">
                        <dl class="font-normal lg:hidden">
                            <dt>Creación</dt>
                            <dd class="text-gray-700 truncate">{{ $quotation->createdAt() }}</dd>
                            <dt>Modificación</dt>
                            <dd class="text-gray-700 truncate">{{ $quotation->updatedAt() }}</dd>
                        </dl>
                    </td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $quotation->createdAt() }}</td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $quotation->updatedAt() }}</td>
                    <td class="px-3 py-4 text-sm text-gray-500">
                        <a href="{{ route('quotations.show', ['id' => $quotation->id()]) }}" class="inline-flex whitespace-nowrap items-center rounded border border-transparent bg-orange-100 px-2.5 py-1.5 text-xs font-medium text-orange-700 hover:bg-orange-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">Ver detalle</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="px-3 py-4 text-sm text-center text-gray-500">Sin Resultados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $quotations->links() }}
    </div>
</x-layout>
