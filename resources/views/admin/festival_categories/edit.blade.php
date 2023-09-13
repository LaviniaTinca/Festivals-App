<x-admin.dashboard-layout>
    <x-admin.setting :heading="'Edit Festival Category ' . $festival_category->name">
        <form method="POST" action="/admin/festival_categories/{{ $festival_category->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $festival_category->name)" required />


            <x-form.button>Update</x-form.button>
        </form>
    </x-admin.setting>
</x-admin.dashboard-layout>