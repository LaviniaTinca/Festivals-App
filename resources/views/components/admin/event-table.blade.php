@props([{{$event}}])
<table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th></th>

            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-red-500 uppercase border-b border-gray-200 ">
                Event Name</th>
            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-red-500 uppercase border-b border-gray-200">
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
                        <img class="w-10 h-10 rounded" src="{{ asset('storage/'.$event->banner_img) }}" alt="img">
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
                {{$event->date}}
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