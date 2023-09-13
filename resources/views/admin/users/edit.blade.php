<x-admin.dashboard-layout>
    <form method="POST" action="/admin/users/{{ $user->id }}" enctype="multipart/form-data">
        @csrf
        <x-admin.create-form heading="Edit user">
            @method('PATCH')
            <div>
                <x-form.input name="name" :value="old('name', $user->name)" required />
                {{--<x-form.input name="email" type="email" :value="old('email', $user->email)" required />--}}
                <x-form.input name="password" type="password" :value="old('password', $user->password)" autocomplete="new-password" required />
            </div>
            <div>
                <x-form.field>
                    <x-form.label name="choose the role" />

                    <select name="role_id" id="role_id">

                        @foreach (\App\Models\UserRole::all() as $role)
                        <option value="{{$role->id}}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ucwords($role->type)}}</option>
                        @endforeach

                    </select>
                    <x-form.error name="role" />
                </x-form.field>

                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="profile_pic" type="file" :value="old('profile_pic', $user->profile_pic)" />
                    </div>

                    <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="" class="rounded-xl ml-6" width="100">
                </div>
            </div>

        </x-admin.create-form>
    </form>
</x-admin.dashboard-layout>