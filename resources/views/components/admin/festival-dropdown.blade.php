<x-admin.dropdown>
    <x-slot name="trigger">
        <button
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">{{ 'Festivals' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />

        </button>
    </x-slot>
    <x-admin.dropdown-item href="/" :active="request()->routeIs('home')">All</x-admin.dropdown-item>

    @foreach (\App\Models\Festival::all() as $festival)
        <x-admin.dropdown-item
            href="/?festival={{ $festival->slug }}&{{ http_build_query(request()->except('festival')) }}"
            :active="request()->is('festivals/' . $festival->slug)">{{ ucwords($festival->name) }}</x-admin.dropdown-item>
    @endforeach
</x-admin.dropdown>
