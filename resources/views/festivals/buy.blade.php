<x-layout>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-10 mb-5 w-40 h-40">
                    <img src="{{asset('storage/'.$festival->banner_img)}}" alt="" class="rounded-xl">
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/" class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Home
                        </a>

                        <div class="space-x-2">
                            <x-category-button :category="$festival->category" />
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$festival->name}}
                    </h1>

                    <div>
                        <h2>Details:</h2>
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
                    <!-- Ticket Table and Form -->
                    <div class="mt-5">

                        <section class="px-10 py-6 ease-in-out">
                            @if ($festival->tickets->count() != 0)


                            <x-admin.panel-table>
                                <table class="min-w-full divide-y divide-gray-200">

                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200">
                                                Ticket name</th>
                                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 ">
                                                Tickets Available</th>
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
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </x-admin.panel-table>


                            @auth
                            <x-panel>
                                <form method="POST" action="/festivals/{{$festival->slug}}/buy-ticket/confirmation">
                                    @csrf

                                    @if ($count==$festival->tickets->count())
                                    <h2 class="text-red-700">There are no tickets available!</h2>
                                    @else

                                    <header class="flex items-center">
                                        <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="Profile Image" width="40" height="40" class="rounded-full">
                                        <h2 class="ml-3"> Please fill in your billing information! </h2>
                                    </header>


                                    <x-form.field>
                                        <x-form.label name="choose the ticket" />

                                        <select name="ticket_id" id="ticket_id">

                                            @foreach (\App\Models\Ticket::all() as $f)
                                            @if ($f->festival_id == $festival->id)
                                            @if ($f->nr_of_tickets > 0)
                                            <option value="{{$f->id}}" {{ old('ticket_id') == $f->id ? 'selected' : '' }}>{{ucwords($f->name)}}</option>
                                            @endif
                                            @endif
                                            @endforeach

                                        </select>
                                        <x-form.error name="ticket_festival" />
                                    </x-form.field>

                                    <x-form1.field>
                                        <x-form1.input name="name" placeholder="Please fill in your full name." value="{{auth()->user()->name}}" required />
                                        <x-form1.error name="name" />
                                    </x-form1.field>


                                    <x-form1.field>
                                        <x-form1.input name="email" placeholder="Please fill in your email" value="{{auth()->user()->email}}" required />
                                        <x-form1.error name="email" />
                                    </x-form1.field>

                                    <x-form1.field>
                                        <x-form1.input name="address" placeholder="Please fill in your address" value="" required />
                                        <x-form1.error name="address" />
                                    </x-form1.field>

                                    <div class="flex justify-end border-t border-gray-200">
                                        <x-form1.button>
                                            Buy Ticket
                                        </x-form1.button>
                                    </div>
                                    @endif

                                </form>
                            </x-panel>
                            @else
                            <p class="font-semibold">
                                <a href="/register" class="hover:underline">Register</a>
                                or
                                <a href="/login" class="hover:underline">log
                                    in to buy
                                    a ticket.
                                </a>
                            </p>
                            @endauth
                            @else
                            <div>
                                <h2 class="mb-4 ml-6 text-left text-gray-700"><strong>The festival has no tickets yet.</strong>
                                </h2>
                            </div>

                            @endif
                        </section>

                    </div>
                </div>
            </article>
        </main>
    </section>

</x-layout>