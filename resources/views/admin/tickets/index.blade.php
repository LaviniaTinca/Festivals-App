<x-admin.dashboard-layout>
    <x-admin.new-element heading="Add new Ticket" :path="'tickets/create'" :all="'All Tickets'">
    </x-admin.new-element>
    <x-admin.panel-table>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 ">
                        Ticket Name</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 ">
                        Festival</th>
                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 ">
                        Price</th>

                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($tickets as $ticket)

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                <a href="/tickets/{{ $ticket->id }}">
                                    {{ $ticket->name }}
                                </a>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap items-center text-sm font-medium text-gray-400">
                        <a href="/admin/festivals/{{ \App\Models\Festival::find($ticket->festival_id)->id }}/details"> {{\App\Models\Festival::find($ticket->festival_id)->name}} </a>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap items-center text-sm font-medium text-gray-400">
                        {{$ticket->price}}
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

                @endforeach
            </tbody>
        </table>
    </x-admin.panel-table>
    {{ $tickets->links()}}
</x-admin.dashboard-layout>