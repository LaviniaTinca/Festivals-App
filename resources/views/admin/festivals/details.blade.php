<x-admin.dashboard-layout>
    <div>
        <h2 class="mb-4 ml-6 text-left text-gray-700"><strong>{{ $festival->name }} Details Page</strong></h2>
    </div>
    <article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
        <div class="max-w-6xl flex  space-x-6 ">
            <div>
                <a href="/storage/{{ $festival->banner_img }}"><img src="{{ asset('storage/' . $festival->banner_img) }}" alt="festival" class="max-w-sm flex h-auto rounded-lg"></a>
            </div>

            <div class="max-w-2xl mt-8 flex flex-col justify-between">
                <header>
                    <div class="space-x-2">
                        <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" style="font-size: 10px">
                            {{ App\Models\FestivalCategory::find($festival->festival_category_id)->name }}
                        </a>
                    </div>

                    <div class="mt-4">
                        <h1 class="text-3xl">
                            <a href="#">
                                {{ $festival->name }}
                            </a>
                        </h1>

                        <span class="mt-2 block text-gray-400 text-xs">
                            Created at
                            <time>{{ $festival->created_at->format('F j, Y, g:i a') }}</time>
                        </span>
                    </div>
                </header>
                <div>
                    <h2>Details:</h2>
                    <div class="flex content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 -3 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                        <span class="mt-2 block text-gray-400 text-xs pl-2">
                            <p>{{ Maize\Markable\Models\Like::count($festival) }}</p>
                        </span>
                    </div>
                    <div class="flex content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="4 -3 20 26" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="mt-2 block text-gray-400 text-xs pl-2">
                            <p>{{ $festival->date }}</p>
                        </span>
                    </div>

                    <div class="flex content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6" viewBox="4 -3 15 25" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <span class="mt-2 block text-gray-400 text-xs pl-2">
                            <p>{{ $festival->location }}</p>
                        </span>
                    </div>

                </div>
            </div>
            <!-- Button section  -->
            @include('admin._festival-details-buttons', ['festival' => $festival])

        </div>
        <div class="space-y-4 lg:text-lg leading-loose mt-3" style="max-width: 70%; margin-top: 2rem;">
            {!! $festival->description !!}
        </div>
        <hr>
    </article>

    <!-- Expandable elements -->

    <div class="w-full my-4 mb-40">
        <div x-data={show:false} class="rounded-sm">
            <div class="border border-b-0 bg-gray-50 px-10 py-6" id="headingOne">
                <button @click="show=!show" style="padding-left: 15px; padding-right: 15px;" class="transition-colors duration-300 size-400 font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2" type="button">
                    <strong>Events List</strong>
                </button>
            </div>
            <div x-show="show" class="px-10 py-6 ease-in-out">
                @if ($festival->events->count() == 0)
                <div>
                    <h2 class="mb-4 ml-6 text-left text-gray-700"><strong>{{ $festival->name }} has no events
                            yet.</strong></h2>
                </div>
                @else
                <x-admin.panel-table>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th></th>

                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 ">
                                    Event Name</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                    Date</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach (App\Models\Event::all() as $event)
                            @if ($event->festival_id == $festival->id)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap ">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-10 h-10 rounded" src="{{ asset('storage/' . $event->banner_img) }}" alt="img">
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            <a href="/events/{{ $event->slug }}">
                                                {{ $event->name }}
                                            </a>
                                        </div>
                                    </div>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap items-center text-sm font-medium text-gray-400">
                                    {{ $event->date }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="/admin/events/{{ $event->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form method="POST" action="/admin/events/{{ $event->id }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="text-xs text-gray-400">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </x-admin.panel-table>
                @endif
            </div>
        </div>

        <br>

        <div x-data={show:false} class="rounded-sm">
            <div class="border border-b-0 bg-gray-50 px-10 py-6" id="headingOne">
                <button @click="show=!show" style="padding-left: 15px; padding-right: 15px;" class="transition-colors duration-300 size-400 font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2" type="button">
                    <strong>Events Card</strong>
                </button>
            </div>
            <div x-show="show" class="px-10 py-6 ease-in-out">
                @if ($festival->events->count() == 0)
                <div>
                    <h2 class="mb-4 ml-6 text-left text-gray-700"><strong>{{ $festival->name }} has no events
                            yet.</strong></h2>
                </div>
                @else
                <div class="md:flex md:-mx-4">
                    <div class="w-full mb-2 md:mx-4 border rounded shadow-sm">
                        @foreach (App\Models\Event::all() as $event)
                        @if ($event->festival_id == $festival->id)
                        <article class="mb-4 transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                            <div class="max-w-6xl flex  space-x-6 ">
                                <div>
                                    <a href="/storage/{{ $event->banner_img }}"><img src="{{ asset('storage/' . $event->banner_img) }}" alt="event" class="max-w-sm flex h-auto rounded-lg"></a>

                                </div>

                                <div class="max-w-xl mt-8 flex flex-col justify-between">
                                    <header>
                                        <div class="space-x-2">
                                            <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" style="font-size: 10px">
                                                {{ App\Models\EventCategory::find($event->event_category_id)->name }}
                                            </a>
                                        </div>

                                        <div class="mt-4">
                                            <h1 class="text-3xl">
                                                <a href="#">
                                                    {{ $event->name }}
                                                </a>
                                            </h1>

                                            <span class="mt-2 block text-gray-400 text-xs">
                                                Created at
                                                <time>{{ $event->created_at->format('F j, Y, g:i a') }}</time>
                                            </span>
                                        </div>
                                    </header>
                                    <div>
                                        <h2>Details:</h2>
                                        <div class="flex content-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 -3 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="mt-2 block text-gray-400 text-xs pl-2">
                                                <p>{{ Maize\Markable\Models\Like::count($event) }}</p>
                                            </span>
                                        </div>


                                        <div class="flex content-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="4 -3 20 26" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="mt-2 block text-gray-400 text-xs pl-2">
                                                <p>{{ $event->date }}</p>
                                            </span>
                                        </div>

                                        <div class="flex content-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6" viewBox="4 -3 15 25" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="mt-2 block text-gray-400 text-xs pl-2">
                                                <p>{{ $event->latitude }}</p>
                                            </span>
                                            <span class="mt-2 block text-gray-400 text-xs pl-2">
                                                <p>{{ $event->longitude }}</p>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <footer class="max-w-xs flex flex-col justify-between items-right mt-8 mb-8">
                                    <div class="mt-20 ml-40 mr-2">
                                        <div>

                                            <a href="/admin/events/{{ $event->id }}/edit">
                                                <button class="transition-colors duration-300 text-xs text-gray-500 font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 text-gray-400">
                                                    Edit Event</button>
                                            </a>
                                        </div>
                                        <br>
                                        <div>
                                            <form method="POST" action="/admin/events/{{ $event->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 text-gray-400">
                                                    Delete Event</button>
                                            </form>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                            <div class="space-y-4 lg:text-lg leading-loose mt-3">
                                {!! $event->description !!}
                            </div>
                            <hr>
                        </article>
                        @endif
                        @endforeach

                    </div>

                </div>

                @endif

            </div>
        </div>

        <br>

        <div x-data={show:false} class="rounded-sm">
            <div class="border border-b-0 bg-gray-50 px-10 py-6" id="headingOne">
                <button @click="show=!show" style="padding-left: 15px; padding-right: 15px;" class="transition-colors duration-300 size-400 font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2" type="button">
                    <strong>Tickets</strong>
                </button>
            </div>
            <div x-show="show" class="px-10 py-6 ease-in-out">
                @if ($festival->tickets->count() == 0)

                <div>
                    <h2 class="mb-4 ml-6 text-left text-gray-700"><strong>The festival has no tickets yet.</strong>
                    </h2>
                </div>
                @else
                <x-admin.panel-table>
                    <table class="min-w-full divide-y divide-gray-200">

                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                    Ticket name</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 ">
                                    Quantity Available</th>
                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 ">
                                    Price</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach (App\Models\Ticket::all() as $ticket)
                            @if ($ticket->festival_id == $festival->id)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            <a href="/tickets/{{ $ticket->name }}">
                                                {{ $ticket->name }}
                                            </a>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap items-center text-sm font-medium text-gray-400">
                                    {{ $ticket->nr_of_tickets }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap items-center text-sm font-medium text-gray-400">
                                    {{ $ticket->price }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="/admin/tickets/{{ $ticket->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form method="POST" action="/admin/tickets/{{ $ticket->id }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="text-xs text-gray-400">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </x-admin.panel-table>
                @endif
            </div>
        </div>

    </div>

</x-admin.dashboard-layout>