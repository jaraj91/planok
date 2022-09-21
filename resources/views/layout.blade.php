<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-white border-b border-gray-200">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex items-center flex-shrink-0">
                            <img class="w-auto h-8" src="{{ asset('img/logo.png') }}" alt="Plan ok">
                        </div>
                        <x-menu />
                    </div>
                    <div id="btn_mobile_menu" class="flex items-center -mr-2 sm:hidden"></div>
                </div>
            </div>
            <x-menu_mobile />
        </nav>

        <div class="py-10">
            <header>
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">{{ $title ?? '' }}</h1>
                </div>
            </header>
            <main>
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <!-- Replace with your content -->
                    <div class="px-4 py-8 sm:px-0">
                        {{ $slot }}
                    </div>
                    <!-- /End replace -->
                </div>
            </main>
        </div>
    </div>

</body>

</html>
