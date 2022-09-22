@props(['products'])

<div>
    <div class="flex flex-col mt-4">
        <div class="mb-4">
            <h1 class="text-xl font-semibold text-gray-900">Productos creados entre el 2018-01-03 y 2018-01-20</h1>
        </div>
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nombre</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Descripción</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Valor Lista</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Orientación</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Piso</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Superficie</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Estado</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Sector</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Fecha Creación</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Fecha Modificación</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($products as $product)
                                <tr>
                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ $product->name() }}</td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $product->description() }}</td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $product->listValue() }}</td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $product->orientation() }}</td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $product->floor() }}</td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $product->surface() }}</td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <span
                                            @class([
                                                'inline-flex',
                                                'px-2',
                                                'text-xs',
                                                'font-semibold',
                                                'leading-5',
                                                'text-green-800' => $product->status()->isAvailable(),
                                                'text-amber-800' => $product->status()->isNotAvailable(),
                                                'bg-green-100' => $product->status()->isAvailable(),
                                                'bg-amber-100' => $product->status()->isNotAvailable(),
                                                'rounded-full',
                                            ])>
                                            {{ $product->status()->label() }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $product->sector() }}</td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $product->createdAt() }}</td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $product->updatedAt() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Sin Registros</td>
                                </tr>
                            @endforelse
                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
