<x-admin.dashboard-layout>
    <x-admin.setting :heading="'Edit Ticket ' . $ticket->name" :all="'All Tickets'" :new="'New Ticket'" :all_path="'/admin/tickets'" :new_path="'/admin/tickets/create'">
        <form method="POST" action="/admin/tickets/{{ $ticket->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.field>
                <x-form.label name="choose the festival" />

                <select name="festival_id" id="festival_id">

                    @foreach (\App\Models\Festival::all() as $f)
                    <option value="{{$f->id}}" {{ old('festival_id') == $f->id ? 'selected' : '' }}>{{ucwords($f->name)}}</option>
                    @endforeach

                </select>
                <x-form.error name="ticket_festival" />
            </x-form.field>
            <x-form.input name="name" :value="old('name', $ticket->name)" required />
            <x-form.input name="price" :value="old('price', $ticket->price)" required />
            <x-form.input name="nr_of_tickets" type='number' />


            <x-form.button>Update</x-form.button>
        </form>
    </x-admin.setting>
</x-admin.dashboard-layout>