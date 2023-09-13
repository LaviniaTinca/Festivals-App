<x-admin.dashboard-layout>
    <form method="POST" action="/admin/users" enctype="multipart/form-data">
        @csrf
        <x-admin.create-form heading="Create new user">
            <div>
                <x-form.input name="name" />
                <x-form.input name="email" type="email" />
                <x-form.input name="password" type="password" autocomplete="new-password" />
            </div>

            <div>
                <x-form.input name="profile_pic" type='file' />

                <x-form.field>
                    <x-form.label name="choose the role" />

                    <select name="role_id" id="role_id">

                        @foreach (\App\Models\UserRole::all() as $role)
                        <option value="{{$role->id}}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ucwords($role->type)}}</option>
                        @endforeach

                    </select>
                    <x-form.error name="role" />
                </x-form.field>

            </div>
        </x-admin.create-form>
    </form>
</x-admin.dashboard-layout>