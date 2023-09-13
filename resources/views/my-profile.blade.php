<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @php
            $user = auth()->user();
        @endphp

        <form method="POST" action="my-profile" enctype="multipart/form-data">
            @csrf
            <x-admin.create-form heading="Edit profile">
                @method('PATCH')
                <div>
                    <x-form.input name="name" :value="old('name', $user->name)" required />
                    <x-form.input name="email" type="email" :value="old('email', $user->email)" required />

                    <div class="flex mt-6">
                        <div class="flex-1">
                            <x-form.input name="profile picture" type="file" :value="old('profile picture', $user->profile_pic)" />
                        </div>

                        <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="" class="rounded-xl ml-6"
                            width="100">
                    </div>
                </div>

                <div>
                    <x-form.input name="password" type="password" autocomplete="new-password" minlength="8" />
                    <x-form.input name="password_confirmation" type="password" autocomplete="new-password"
                        minlength="8" />

                </div>

            </x-admin.create-form>
        </form>

    </main>>

</x-layout>
