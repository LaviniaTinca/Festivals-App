@auth
    <x-panel>
        <form method="POST" action="/events/{{$event->slug}}/comments">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{auth()->id()}}"
                     alt="Profile Image"
                     width="40"
                     height="40"
                     class="rounded-full">
                <h2 class="ml-3"> Want to participate? </h2>
            </header>

            <x-form1.field>
                <x-form1.textarea name="body" placeholder="Quick, think of something to say!"/>
                <x-form1.error name="body"/>
            </x-form1.field>

            <div class="flex justify-end border-t border-gray-200">
                <x-form1.button>
                    Post
                </x-form1.button>
            </div>

        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a>
        or
        <a href="/login"
           class="hover:underline"
        >log
            in to leave
            a comment.
        </a>
    </p>
@endauth
