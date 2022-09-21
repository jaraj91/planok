<!-- Mobile menu button -->
<button type="button"
    class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2"
    aria-controls="mobile-menu" aria-expanded="false">
    <span class="sr-only">Open main menu</span>
    <!--
    Heroicon name: outline/bars-3

    Menu open: "hidden", Menu closed: "block"
-->
    <svg x-show="! open" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
    </svg>
    <!--
    Heroicon name: outline/x-mark

    Menu open: "block", Menu closed: "hidden"
-->
    <svg x-show="open" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>
