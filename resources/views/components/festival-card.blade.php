@props(['festival'])
<article {{$attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0
    hover:border-opacity-5
    rounded-xl'])}}>
    <div class="py-6 px-5">
        <div>
            <img src="{{asset('storage/'.$festival->banner_img)}}" alt="Festival illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">

                <div class="space-x-2">
                    <x-category-button :category="$festival->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/festivals/{{$festival->slug}}">
                            {{$festival->name}}
                        </a>
                    </h1>

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

            </header>

            <div class="text-sm mt-2 space-y-4 mt-3">

                {!! $festival->description !!}

            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="hidden lg:block">
                    <a href="/festivals/{{$festival->slug}}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>