<x-admin.dashboard-layout>
    <x-admin.new-element heading="Add new festival" :path="'festivals/create'" :all="'All Festivals'">
    </x-admin.new-element>
    <x-admin.panel-table>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Festival Name</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        Festival Location</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($festivals as $festival)
                <tr>

                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-10 h-10 rounded" src="{{ asset('storage/'.$festival->banner_img) }}" alt="img">
                            </div>

                            <div class="ml-4">
                                <div class="text-sm font-medium leading-5 text-gray-900">
                                    <a href="/admin/festivals/{{ $festival->id }}/details">
                                        {{ $festival->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                        {{$festival->location}}
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="/admin/festivals/{{ $festival->id }}/details" class="text-indigo-500 hover:text-blue-700">Details</a>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="/admin/festivals/{{ $festival->id }}/edit" class="text-blue-500 hover:text-blue-700">Edit</a>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form method="POST" action="/admin/festivals/{{ $festival->id }}">
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
    <div class="mb-6">{{ $festivals->links()}}</div>
</x-admin.dashboard-layout>