<x-admin.dashboard-layout>
    <x-admin.setting heading="Create new Ticket">
        <form method="POST" action="/admin/tickets" enctype="multipart/form-data">
            @csrf
            <x-form.field>
                <x-form.label name="choose the festival" />

                <select name="festival_id" id="festival_id">

                    @foreach (\App\Models\Festival::all() as $f)
                    <option value="{{$f->id}}" {{ old('festival_id') == $f->id ? 'selected' : '' }}>{{ucwords($f->name)}}</option>
                    @endforeach

                </select>
                <x-form.error name="ticket_festival" />
            </x-form.field>
            <x-form.input name="name" />
            <x-form.input name="price" type='number' />
            <x-form.input name="nr_of_tickets" type='number' />

            <x-form.button>Create</x-form.button>
        </form>
    </x-admin.setting>
</x-admin.dashboard-layout>