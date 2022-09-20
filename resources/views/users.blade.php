<x-layout>
    <x-slot:title>Usuarios</x-slot:title>
    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nombre</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Rut</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Edad</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Sexo</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Correo</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Perfil</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Estado</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($users as $user)
                <tr>
                    <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
                        {{ str($user->nombre . ' ' . $user->apellido)->title() }}
                        <dl class="font-normal lg:hidden">
                            <dt class="sr-only">Rut</dt>
                            <dd class="mt-1 text-gray-700 truncate">{{ str($user->rut)->rut() }}</dd>
                            <dt class="sr-only">Edad</dt>
                            <dd class="mt-1 text-gray-700 truncate">{{ $user->edad }} años</dd>
                            <dt class="sr-only">Sexo</dt>
                            <dd class="mt-1 text-gray-700 truncate">{{ str($user->sexo)->title() }}</dd>
                            <dt class="sr-only sm:hidden">Correo</dt>
                            <dd class="mt-1 text-gray-500 lowercase truncate sm:hidden">{{ $user->correo }}</dd>
                        </dl>
                    </td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ str($user->rut)->rut() }}</td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ $user->edad }}</td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">{{ str($user->sexo)->title() }}</td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 lowercase sm:table-cell">{{ $user->correo }}</td>
                    <td class="px-3 py-4 text-sm text-gray-500">{{ $user->perfil ?? 'Sin perfil' }}</td>
                    <td class="px-3 py-4">
                        <span
                            @class([
                                'inline-flex',
                                'px-2',
                                'text-xs',
                                'font-semibold',
                                'leading-5',
                                'text-green-800' => $user->estado == 'Activo',
                                'text-gray-800' => $user->estado != 'Activo',
                                'bg-green-100' => $user->estado == 'Activo',
                                'bg-gray-100' => $user->estado != 'Activo',
                                'rounded-full',
                            ])
                        >
                            {{ $user->estado }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-3 py-4 text-sm text-center text-gray-500">Sin Resultados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</x-layout>
