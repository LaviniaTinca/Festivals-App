<x-layout>
    @include('festivals._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($festivals->count())
            <x-festivals-grid :festivals="$festivals"/>
            {{$festivals->links()}}
        @else
            <p class="text-center">No festivals posted yet. Please check back later.</p>
        @endif
    </main>
</x-layout>
