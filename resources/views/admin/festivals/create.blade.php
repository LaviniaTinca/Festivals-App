<x-admin.dashboard-layout>
    <x-admin.setting heading="Create New Festival" >
        <form method="POST" action="/admin/festivals" enctype="multipart/form-data">
            @csrf
            <x-form.input name="name" />
            <x-form.input name="slug" />
            <x-form.input name="banner_img" type='file' />
            <x-form.input name="date" type='datetime-local' />
            <x-form.input name="location" />
            <x-form.textarea name="description" />

            <x-form.field>
                <x-form.label name="festival_category" />

                <select name="festival_category_id" id="festival_category_id">

                    @foreach (\App\Models\FestivalCategory::all() as $category)
                    <option value="{{$category->id}}" {{ old('festival_category_id') == $category->id ? 'selected' : '' }}>{{ucwords($category->name)}}</option>
                    @endforeach

                </select>
                <x-form.error name="festival_category" />
            </x-form.field>
            <x-form.button>Create</x-form.button>

        </form>
    </x-admin.setting>
</x-admin.dashboard-layout>