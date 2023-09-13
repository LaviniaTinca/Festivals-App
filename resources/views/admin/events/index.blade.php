<x-admin.dashboard-layout>
    <x-admin.new-element heading="Add new event" :path="'events/create'" :all="'All Events'">
    </x-admin.new-element>
    <x-admin.panel-table>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Event Name</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Festival</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($events as $event)

                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-10 h-10 rounded-full" src="{{ asset('storage/'.$event->banner_img) }}" alt="img">
                            </div>

                            <div class="ml-4">
                                <div class="text-sm font-medium leading-5 text-gray-900">
                                    <a href="#/admin/events/{{ $event->id }}/details">
                                        {{ $event->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap items-center text-sm font-medium text-gray-400">
                        <a href="/admin/festivals/{{ \App\Models\Festival::find($event->festival_id)->id }}/details">
                            {{\App\Models\Festival::find($event->festival_id)->name}}
                        </a>
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

                @endforeach
            </tbody>
        </table>
    </x-admin.panel-table>
    {{ $events->links()}}
</x-admin.dashboard-layout>