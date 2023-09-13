@props(['festival'])
<div>
    <h2>Details:</h2>
    @include('_like-festival', ['festival'=>$festival])


    <div class="flex content-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="4 -3 20 26" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="mt-2 block text-gray-400 text-xs pl-2">
            <p>{{$festival->date}}</p>
        </span>
    </div>

    <div class="flex content-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6" viewBox="4 -3 15 25" fill="currentColor">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
        </svg>
        <span class="mt-2 block text-gray-400 text-xs pl-2">
            <p>{{$festival->location}}</p>
        </span>
    </div>

</div>

<div class="space-y-4 lg:text-lg leading-loose mt-3">
    {!! $festival->description !!}
</div>