<x-layout>
    <x-slot:title>Cotización ID: {{ $quotation->id() }}</x-slot>
    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Detalles</h3>
            <div class="grid grid-cols-1 mt-1 text-sm text-gray-500 sm:grid-cols-2 lg:grid-cols-4">
                <p>Fecha Creación: <span class="mt-1 text-sm font-medium text-gray-900">{{ $quotation->createdAt() }}</span></p>
                <p>Fecha Modificación: <span class="mt-1 text-sm font-medium text-gray-900">{{ $quotation->updatedAt() }}</span></p>
                <p>
                    Estado:
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
                        ])>
                        {{ $quotation->status()->label() }}
                    </span>
                </p>
                <p>Crédito: <span class="mt-1 text-sm font-medium text-gray-900">{{ $quotation->credit() }}</span></p>
                <p>Monto Crédito: <span class="mt-1 text-sm font-medium text-gray-900">{{ $quotation->creditAmount() }}</span></p>
                <p>Sub Total: <span class="mt-1 text-sm font-medium text-gray-900">{{ $quotation->subTotal() }}</span></p>
                <p>Descuento: <span class="mt-1 text-sm font-medium text-gray-900">{{ $quotation->discount() }}</span></p>
                <p>Total: <span class="mt-1 text-sm font-medium text-gray-900">{{ $quotation->total() }}</span></p>
            </div>
        </div>
        <div class="px-4 py-5 border-t border-gray-200 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div>
                    <h4 class="font-medium leading-6 text-gray-900 text-md">Cliente</h4>
                    <div class="grid grid-cols-1 mt-2 gap-x-4 gap-y-8 lg:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Rut</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $customer->rut() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $customer->name() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $customer->phone() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $customer->email() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Edad</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $customer->age() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Sexo</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $customer->sex() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Region</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $customer->region() }}</dd>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="font-medium leading-6 text-gray-900 text-md">Usuario</h4>
                    <div class="grid grid-cols-1 mt-2 gap-x-4 gap-y-8 lg:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Rut</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->rut() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->name() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Perfil</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->profile() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->email() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Edad</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->age() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Sexo</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $user->sex() }}</dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Estado</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <span
                                    @class([
                                        'inline-flex',
                                        'px-2',
                                        'text-xs',
                                        'font-semibold',
                                        'leading-5',
                                        'text-green-800' => $user->status()->isActive(),
                                        'text-gray-800' => $user->status()->isNotActive(),
                                        'bg-green-100' => $user->status()->isActive(),
                                        'bg-gray-100' => $user->status()->isNotActive(),
                                        'rounded-full',
                                    ])>
                                    {{ $user->status()->label() }}
                                </span>
                            </dd>
                        </div>
                    </div>
                </div>
            </dl>
            <div class="grid grid-cols-1 mt-4 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <div class="mt-1 text-sm text-gray-900">
                        <x-products :products="$products" title="Productos" />
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
