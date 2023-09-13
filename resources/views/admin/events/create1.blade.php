<x-admin.dashboard-layout>
    <x-admin.setting :heading="'Create new event for '. $festival->name">
        <form method="POST" action="/admin/events/{{$festival->id}}/create1" enctype="multipart/form-data">
            @csrf


            <x-form.input name="name" />
            <x-form.input name="slug" />
            <x-form.input name="banner_img" type='file' />
            <x-form.input name="date" type='datetime-local' />
            <x-form.input name="latitude" type='number' />
            <x-form.input name="longitude" type='number' />
            <x-form.textarea name="description" />

            <x-form.field>
                <x-form.label name="event_category" />

                <select name="event_category_id" id="event_category_id">

                    @foreach (\App\Models\EventCategory::all() as $category)
                    <option value="{{$category->id}}" {{ old('event_category_id') == $category->id ? 'selected' : '' }}>{{ucwords($category->name)}}</option>
                    @endforeach

                </select>
                <x-form.error name="event_category" />
            </x-form.field>
            <x-form.button>Create</x-form.button>

        </form>
    </x-admin.setting>
</x-admin.dashboard-layout>