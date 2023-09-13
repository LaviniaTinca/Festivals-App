@props(['heading', 'all', 'new', 'all_path', 'new_path'])

<div class="p-5 ml-20 mr-20 ">
    <h1 class="text-lg font-bold mb-4 text-gray-700">{{$heading}}</h1>
    <div class="flex justify-between items-center mt-8 bg-white rounded-xl">
        <div class="flex">


            <main class="flex-1">
                <x-panel>
                    {{ $slot }}
                </x-panel>

            </main>
        </div>

    </div>
</div>