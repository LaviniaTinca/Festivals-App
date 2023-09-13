<x-admin.dashboard-layout>
    <x-admin.setting :heading="'Edit Event: ' . $event->name">
        <form method="POST" action="/admin/events/{{ $event->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.field>
                <x-form.label name="choose the festival" />

                <select name="festival_id" id="festival_id">

                    @foreach (\App\Models\Festival::all() as $f)
                    <option value="{{$f->id}}" {{ old('festival_id') == $f->id ? 'selected' : '' }}>{{ucwords($f->name)}}</option>
                    @endforeach

                </select>
                <x-form.error name="event_festival" />
            </x-form.field>
            <x-form.input name="name" :value="old('name', $event->name)" required />
            <x-form.input name="slug" :value="old('slug', $event->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="banner_img" type="file" :value="old('banner_img', $event->banner_img)" />
                </div>

                <img src="{{ asset('storage/' . $event->banner_img) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.input name="date" type="datetime-local" :value="old('date', $event->date)" required />
            <x-form.input name="latitude" type="number" :value="old('latitude', $event->latitude)" required />
            <x-form.input name="longitude" type="number" :value="old('longitude', $event->longitude)" required />
            <x-form.textarea name="description" required>{{ old('description', $event->description) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="event category" />

                <select name="event_category_id" id="event_category_id" required>
                    @foreach (\App\Models\EventCategory::all() as $category)
                    <option value="{{ $category->id }}" {{ old('event_category_id', $event->event_category_id) == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="event category" />
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-admin.setting>
</x-admin.dashboard-layout>