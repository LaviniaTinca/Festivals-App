<x-admin.dashboard-layout>
    <div class="w-full my-4 mb-40">
        <div x-data={show:false} class="rounded-sm">
            <div class="border border-b-0 bg-gray-50 px-10 py-6" id="headingOne">
                <button @click="show=!show" style="padding-left: 15px; padding-right: 15px;" class="transition-colors duration-300 size-400 font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2" type="button">
                    <strong>Festival Categories</strong>
                </button>
            </div>
            <div x-show="show" class="px-10 py-6 ease-in-out">
                @if (App\Models\FestivalCategory::count() == 0)
                <div>
                    <h2 class="mb-4 ml-6 text-left text-red-700"><strong>There are no festival categories in the database.</strong></h2>
                </div>
                @else
                <x-admin.new-element heading="Add new festival category" :path="'festival_categories/create'" :all="'All festival categories:'"></x-admin.new-element>
                <div>
                    <x-admin.panel-table>
                        <table class="min-w-full divide-y divide-gray-200">

                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach (\App\Models\FestivalCategory::all() as $category)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="#">
                                                    {{ $category->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/admin/festival_categories/{{ $category->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/admin/festival_categories/{{ $category->id }}">
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


                </div>

                @endif

            </div>
        </div>

        <br>

        <div x-data={show:false} class="rounded-sm">
            <div class="border border-b-0 bg-gray-50 px-10 py-6" id="headingOne">
                <button @click="show=!show" style="padding-left: 15px; padding-right: 15px;" class="transition-colors duration-300 size-400 font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2" type="button">
                    <strong> Event Categories </strong>
                </button>
            </div>
            <div x-show="show" class="px-10 py-6 ease-in-out">
                @if (App\Models\EventCategory::count() == 0)
                <div>
                    <h2 class="mb-4 ml-6 text-left text-red-700"><strong>There are no event categories in the database.</strong></h2>
                </div>
                @else
                <x-admin.new-element heading="Add new event category" :path="'event_categories/create'" :all="'All event categories:'"></x-admin.new-element>
                <div>
                    <!-- <ul class="px-8">
                        @foreach (App\Models\EventCategory::all() as $ev_c)
                        <li>
                            <h6>
                                {{$ev_c->name}}
                            </h6>
                        </li>
                        @endforeach
                    </ul> -->
                    <x-admin.panel-table>
                        <table class="min-w-full divide-y divide-gray-200">

                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach (\App\Models\EventCategory::all() as $category)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="#">
                                                    {{ $category->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/admin/event_categories/{{ $category->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/admin/event_categories/{{ $category->id }}">
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


                </div>

                @endif

            </div>
        </div>

    </div>

</x-admin.dashboard-layout>