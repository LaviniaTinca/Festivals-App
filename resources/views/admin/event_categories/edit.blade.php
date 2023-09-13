<x-admin.dashboard-layout>
    <x-admin.setting :heading="'Edit Event Category ' . $event_category->name">
        <form method="POST" action="/admin/event_categories/{{ $event_category->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $event_category->name)" required />


            <x-form.button>Update</x-form.button>
        </form>
    </x-admin.setting>
</x-admin.dashboard-layout>