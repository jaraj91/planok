@props(['route'])

@php
    $isCurrentRoute = request()->routeIs($route);
@endphp

<a
    href="{{ route($route) }}"
    @class([
        'block',
        'py-2',
        'pl-3',
        'pr-4',
        'text-base',
        'font-medium',
        'border-l-4',
        'bg-orange-50' => $isCurrentRoute,
        'text-orange-700' => $isCurrentRoute,
        'text-gray-600' => ! $isCurrentRoute,
        'border-orange-500' => $isCurrentRoute,
        'border-transparent' => ! $isCurrentRoute,
        'hover:bg-gray-50' => ! $isCurrentRoute,
        'hover:border-gray-300' => ! $isCurrentRoute,
        'hover:text-gray-800' => ! $isCurrentRoute,
    ])
>
    {{ $slot }}
</a>