<x-admin.dashboard-layout>
    <x-admin.setting heading="Create new Festival Category">
        <form method="POST" action="/admin/festival_categories" enctype="multipart/form-data">
            @csrf

            <x-form.input name="name" />

            <x-form.button>Create</x-form.button>

        </form>
    </x-admin.setting>
</x-admin.dashboard-layout>