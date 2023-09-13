<x-admin.dashboard-layout>

    <x-admin.setting :heading="'Create Ticket for ' . $festival->name">
        <form method="POST" action="/admin/tickets/{{$festival->id}}/create1" enctype="multipart/form-data">
            @csrf

            <x-form.input name="name" />
            <x-form.input name="price" type='number' />
            <x-form.input name="nr_of_tickets" type='number' />

            <x-form.button>Create</x-form.button>
        </form>
    </x-admin.setting>
</x-admin.dashboard-layout>