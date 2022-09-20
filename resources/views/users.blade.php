<x-layout>
    <x-slot:title>Usuarios</x-slot:title>
    <div class="-mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Title</th>
                    <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Email</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="w-full py-4 pl-4 pr-3 text-sm font-medium text-gray-900 max-w-0 sm:w-auto sm:max-w-none sm:pl-6">
                        Lindsay Walton
                        <dl class="font-normal lg:hidden">
                            <dt class="sr-only">Title</dt>
                            <dd class="mt-1 text-gray-700 truncate">Front-end Developer</dd>
                            <dt class="sr-only sm:hidden">Email</dt>
                            <dd class="mt-1 text-gray-500 truncate sm:hidden">lindsay.walton@example.com</dd>
                        </dl>
                    </td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 lg:table-cell">Front-end Developer</td>
                    <td class="hidden px-3 py-4 text-sm text-gray-500 sm:table-cell">lindsay.walton@example.com</td>
                    <td class="px-3 py-4 text-sm text-gray-500">Member</td>
                </tr>

                <!-- More people... -->
            </tbody>
        </table>
    </div>


</x-layout>
