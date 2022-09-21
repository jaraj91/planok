<div
    x-data="{
        open: false,
        toggle() {
            this.open = ! this.open;
        },
    }"
    x-show="open"
    x-transition
    class="sm:hidden"
>
    <div class="pt-2 pb-3 space-y-1">
        <x-menu_mobile.item route="dashboard">Dashboard</x-menu_mobile.item>
        <x-menu_mobile.item route="users">Usuarios</x-menu_mobile.item>
        <x-menu_mobile.item route="quotations">Cotizaciones</x-menu_mobile.item>
    </div>
    <template x-teleport="#btn_mobile_menu" x-on:click="toggle()">
        <x-menu_mobile.button />
    </template>
</div>