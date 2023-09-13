<x-admin.dashboard-layout>
    <x-admin.setting :heading="'Create new event'">
        <form method="POST" action="/admin/events" enctype="multipart/form-data">
            @csrf
            <x-form.field>
                <x-form.label name="choose the festival" />

                <select name="festival_id" id="festival_id">

                    @foreach (\App\Models\Festival::all() as $f)
                    <option value="{{$f->id}}" {{ old('festival_id') == $f->id ? 'selected' : '' }}>{{ucwords($f->name)}}</option>
                    @endforeach

                </select>
                <x-form.error name="event_festival" />
            </x-form.field>

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