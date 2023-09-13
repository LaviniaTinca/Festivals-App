<x-admin.dashboard-layout>
    <x-admin.setting :heading="'Edit Festival: ' . $festival->name">
        <form method="POST" action="/admin/festivals/{{ $festival->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $festival->name)" required />
            <x-form.input name="slug" :value="old('slug', $festival->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="banner_img" type="file" :value="old('banner_img', $festival->banner_img)" />
                </div>

                <img src="{{ asset('storage/' . $festival->banner_img) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>
            <x-form.input name="date" type="datetime-local" :value="old('date', $festival->date)" required />
            <x-form.input name="location" :value="old('location', $festival->location)" required />
            <x-form.textarea name="description" required>{{ old('description', $festival->description) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="festival_category" />

                <select name="festival_category_id" id="festival_category_id" required>
                    @foreach (\App\Models\FestivalCategory::all() as $category)
                    <option value="{{ $category->id }}" {{ old('festival_category_id', $festival->festival_category_id) == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="festival_category" />
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-admin.setting>
</x-admin.dashboard-layout>