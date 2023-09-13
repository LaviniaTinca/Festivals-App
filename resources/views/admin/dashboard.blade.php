<x-admin.dashboard-layout>

    <body>
        <div class="md:flex md:-mx-4">
            <div class="w-full mb-2 md:mx-4 border rounded shadow-sm">
                @foreach (App\Models\Festival::all() as $festival)

                <article class="mb-4 transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                    <div class="max-w-6xl flex  space-x-6 ">
                        <div>
                            <a href="storage/{{$festival->banner_img}}"><img src="{{ asset('storage/'.$festival->banner_img) }}" alt="fest" class="max-w-sm flex h-auto rounded-lg"></a>

                        </div>

                        <div class="max-w-2xl mt-8 flex flex-col justify-between">
                            <header>
                                <div class="space-x-2">
                                    <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" style="font-size: 10px">
                                        {{App\Models\FestivalCategory::find($festival->festival_category_id)->name}}
                                    </a>
                                </div>

                                <div class="mt-4">
                                    <h1 class="text-3xl">
                                        <a href="/admin/festivals/{{ $festival->id }}/details">
                                            {{$festival->name}}
                                        </a>
                                    </h1>

                                    <span class="mt-2 block text-gray-400 text-xs">
                                        Created at
                                        <time>{{$festival->created_at->format('F j, Y, g:i a') }}</time>
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
                                        <p>{{ Maize\Markable\Models\Like::count($festival)}}</p>
                                    </span>
                                </div>
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
                        </div>
                        <!-- Buttons section -->
                        @include('admin._festival-details-buttons', ['festival'=>$festival])
                    </div>
                    <div class="space-y-4 lg:text-lg leading-loose mt-3">
                        {!! $festival->description !!}
                    </div>
                    <hr>
                    <hr class="mt-2 mb-2">
                </article>

                @endforeach
            </div>
        </div>

    </body>
</x-admin.dashboard-layout>