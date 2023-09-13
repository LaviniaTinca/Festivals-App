@auth
<div class="flex content-center">
    <form action="{{ route('like', $event) }}" method="post">
        @csrf
        <button class="{{  Maize\Markable\Models\Like::has($event, auth()->user()) ? 'hidden' : '' }} transition-colors duration-300 text-xs font-semibold hover:bg-gray-300 rounded-full ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 -3 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg>
        </button>

    </form>

    <form action="{{ route('unlike', $event) }}" method="post">
        @csrf
        <button class="{{  Maize\Markable\Models\Like::has($event, auth()->user()) ? 'block' : 'hidden'  }} transition-colors duration-300 text-xs font-semibold hover:bg-gray-300 rounded-full ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 -3 20 20" fill="red">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg>
        </button>
    </form>

    <span class="mt-2 block text-gray-400 text-xs pl-2">
        <p>{{ Maize\Markable\Models\Like::count($event)}}</p>

    </span>
</div>
@else
<div class="flex content-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 -3 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
    </svg>
    <span class="mt-2 block text-gray-400 text-xs pl-2">
        <p>{{ Maize\Markable\Models\Like::count($event)}}</p>
    </span>
</div>
@endauth