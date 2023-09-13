<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ asset('storage/' . $festival->banner_img) }}" alt="" class="rounded-xl">
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
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
                        {{ $festival->name }}
                    </h1>

                    <div>
                        <h2>Details:</h2>
                        @include('_like-festival', ['festival' => $festival])


                        <div class="flex content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="4 -3 20 26"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="mt-2 block text-gray-400 text-xs pl-2">
                                <p>{{ $festival->date }}</p>
                            </span>
                        </div>

                        <div class="flex content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6" viewBox="4 -3 15 25"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="mt-2 block text-gray-400 text-xs pl-2">
                                <p>{{ $festival->location }}</p>
                            </span>
                        </div>

                    </div>

                    <div class="space-y-4 lg:text-lg leading-loose mt-3">
                        {!! $festival->description !!}
                    </div>

                    <div class="flex flex-col">
                        <h2 class="font-bold mt-3 mb-3">Events:</h2>
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-5 lg:px-3">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Name
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Date
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Latitude &<br> Longitude
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Likes
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @foreach ($festival->events as $event)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-no-wrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 w-10 h-10">
                                                                <a href="/events/{{ $event->slug }}"><img
                                                                        class="w-10 h-10 rounded"
                                                                        src="{{ asset('storage/' . $event->banner_img) }}"
                                                                        alt="img"></a>
                                                            </div>

                                                            <div class="ml-4">
                                                                <div
                                                                    class="text-sm font-medium leading-5 text-gray-900">
                                                                    <a href="/events/{{ $event->slug }}">
                                                                        {{ $event->name }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-green-800">
                                                            {{ $event->date }}
                                                        </span>
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                                            {{ number_format($event->latitude, 2) }}
                                                        </span>
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            {{ number_format($event->longitude, 2) }}
                                                        </span>
                                                    </td>


                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-green-800">
                                                            {{ Maize\Markable\Models\Like::count($event) }}
                                                        </span>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-6 mb-3 flex justify-end">
                                    <a target="_blank" href="/festivals/{{ $festival->slug }}/buy-ticket"
                                        class="flex p-2 pl-5 pr-5 bg-transparent border-2 border-green-500 text-green-500 text-lg rounded-lg transition-colors duration-700 transform hover:bg-green-500 hover:text-gray-100 focus:border-4 focus:border-green-500">Buy
                                        Ticket
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-7 w-7" fill="none"
                                            viewBox="0 0 23 22" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </main>
    </section>
</x-layout>
