@props(['route'])

@php
    $isCurrentRoute = request()->routeIs($route);
@endphp

<a
    href="{{ route($route) }}"
    @class([
        'border-orange-500' => $isCurrentRoute,
        'border-transparent' => ! $isCurrentRoute,
        'text-gray-900' => $isCurrentRoute,
        'text-gray-500' => ! $isCurrentRoute,
        'hover:border-gray-300',
        'hover:text-gray-700',
        'inline-flex items-center',
        'px-1',
        'pt-1',
        'border-b-2',
        'text-sm',
        'font-medium',
    ])>
    {{ $slot }}
</a>
