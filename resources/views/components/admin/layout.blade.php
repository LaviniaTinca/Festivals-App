<!doctype html>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin</title>
<link rel="icon" type="image/x-icon" href="/icon.png">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dis/alpine.min.js" defer></script>
<script src="//unpkg.com/alpinejs" defer></script>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/admin/dashboard">
                    <img src="/images/FestivalAppLogo.png" alt="Festival App Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">

                @auth
                    <x-admin.dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}</button>
                        </x-slot>

                        @admin
                            <x-admin.dropdown-item href="/admin/dashboard" :active="request()->is('admin/dashboard')">Dashboard
                            </x-admin.dropdown-item>
                        @endadmin

                        <x-admin.dropdown-item href="/my-profile" :active="request()->is('my-profile')">My Profile
                        </x-admin.dropdown-item>

                

                        <x-admin.dropdown-item href="#" x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-admin.dropdown-item>
                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                    </x-admin.dropdown>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-3 text-xs font-bold uppercase">Log In</a>

                @endauth

                
                {{-- <a href="/admin/dashboard"
                    class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Dashboard
                </a> --}}
            </div>
        </nav>

        {{ $slot }}


    </section>

    <x-flash />

</body>
