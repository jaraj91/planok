@props(['customers'])

<div>
    <div class="flex flex-col">
        <div class="mb-4">
            <h1 class="text-xl font-semibold text-gray-900">Clientes que han comprado Estacionamientos en Santiago</h1>
        </div>
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Rut</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nombre</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Teléfono</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Edad</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Sexo</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Región</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($customers as $customer)
                            <tr>
                                <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">{{ $customer->rut() }}</td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $customer->name() }}</td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $customer->phone() }}</td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $customer->email() }}</td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $customer->age() }}</td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $customer->sex() }}</td>
                                <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $customer->region() }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Sin Registros</td>
                                </tr>
                            @endforelse
                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
