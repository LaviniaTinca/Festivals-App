<x-admin.layout>
    <div class="flex h-screen">
        <div class="px-4 py-2 bg-gray-100 bg-gray-500 lg:w-1/4 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-8 h-8 text-white lg:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <div class="hidden lg:block">
                <div class="my-2 mb-6">
                    <h1 class="text-2xl font-bold text-white">
                        <a href="/admin/dashboard" class="inline-block w-full h-full px-2 py-2 rounded font-bold text-white {{request()->is('admin/dashboard')? 'bg-gray-600':''}}">Admin Dashboard</a>
                    </h1>
                </div>
                <ul>
                    <hr class="mb-4 mt-4">
                    <li class="mb-2 rounded hover:shadow hover:bg-gray-800">
                        <a href="/admin/users" class="inline-block w-full h-full px-3 py-2 font-bold text-white {{request()->is('admin/users')? 'bg-gray-800':''}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Users
                        </a>
                    </li>
                    <li class="mb-2 rounded hover:shadow hover:bg-gray-800">
                        <a href="/admin/categories" class="inline-block w-full h-full px-3 py-2 font-bold text-white {{request()->is('admin/categories')? 'bg-gray-800':''}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Categories
                        </a>
                    </li>
                    <li class="mb-2 rounded hover:shadow hover:bg-gray-800">
                        <a href="/admin/festivals" class="inline-block w-full h-full px-3 py-2 font-bold text-white {{request()->is('admin/festivals')? 'bg-gray-800':''}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                            </svg>
                            Festivals
                        </a>
                    </li>

                    <li class="mb-2 rounded hover:shadow hover:bg-gray-800">
                        <a href="/admin/events" class="inline-block w-full h-full px-3 py-2 font-bold text-white {{request()->is('admin/events')? 'bg-gray-800':''}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                            </svg>
                            Events
                        </a>
                    </li>

                    <li class="mb-2 rounded hover:shadow hover:bg-gray-800">
                        <a href="/admin/tickets" class="inline-block w-full h-full px-3 py-2 font-bold text-white {{request()->is('admin/tickets')? 'bg-gray-800':''}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Tickets
                        </a>
                    </li>

                    <li class="mb-2 rounded hover:shadow hover:bg-gray-800">
                        <a href="/admin/reports" class="inline-block w-full h-full px-3 py-2 font-bold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Reports
                        </a>
                    </li>

                    <li class="mb-2 rounded hover:shadow hover:bg-gray-800">
                        <a href="#" class=" line-through inline-block w-full h-full px-3 py-2 font-bold text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Inbox
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="w-full px-4 py-2 bg-gray-100 lg:w-full rounded-xl">
            <div class="container mx-auto mt-12">
                <div class="grid gap-4 lg:grid-cols-3">
                    <a href="/admin/users">
                        <div class="flex items-center px-4 py-6 bg-white rounded-md shadow-md">
                            <div class="p-3 bg-blue-500 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="mx-4">
                                <h4 class="text-2xl font-semibold text-gray-700">{{\App\Models\User::all()->count()}}</h4>
                                <div class="text-gray-500">Users</div>
                            </div>
                        </div>
                    </a>
                    <a href="/admin/festivals">
                        <div class="flex items-center px-4 py-6 bg-white rounded-md shadow-md">
                            <div class="p-3 bg-blue-500 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                            </div>
                            <div class="mx-4">
                                <h4 class="text-2xl font-semibold text-gray-700">{{\App\Models\Festival::all()->count()}}</h4>
                                <div class="text-gray-500">Festivals</div>
                            </div>
                        </div>
                    </a>
                    <a href="/admin/events">
                        <div class="flex items-center px-4 py-6 bg-white rounded-md shadow-md">
                            <div class="p-3 bg-blue-500 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="mx-4">
                                <h4 class="text-2xl font-semibold text-gray-700">{{\App\Models\Event::all()->count()}}</h4>
                                <div class="text-gray-500">Events</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="flex flex-col mt-8">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>