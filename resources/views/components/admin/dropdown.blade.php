@props(['trigger'])

<div x-data="{ show: false }" @click.away="show=false" class="position relative">
    <!-- {{-- !! Trigger --}} -->
    <div @click="show =! show">
        {{ $trigger }}
    </div>

    <!-- Dropdown Links -->
    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52"
        style="border: solid #000; border-width:0.4px;" style="display:none">
        {{ $slot }}
    </div>
</div>
