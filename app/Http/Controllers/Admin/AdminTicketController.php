<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TicketForFestivalRequest;
use App\Http\Requests\Admin\TicketRequest;
use App\Models\Festival;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminTicketController extends Controller
{
    public function index()
    {
        return view('admin.tickets.index', [
            'tickets' => Ticket::paginate(7),
        ]);
    }

    public function create()
    {
        return view('admin.tickets.create');
    }
    public function create1(Festival $festival)
    {
        return view('admin.tickets.create1')->with(['festival' => $festival]);
    }

    public function store(TicketRequest $request)
    {

        Ticket::create($request->all());

        return redirect('/admin/tickets')->with('success', 'New Ticket Created!');;
    }

    public function store1(Festival $festival, TicketForFestivalRequest $request)
    {
        $ticket = Ticket::create($request->all());
        $ticket->festival_id = $festival->id;
        $ticket->save();

        return redirect('/admin/festivals')->with('success', 'New Ticket Created!');;
    }

    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.edit', ['ticket' => $ticket]);
    }

    public function update(Ticket $ticket, TicketRequest $request)
    {
        $ticket->update($request->all());
        return redirect('/admin/tickets')->with('success', 'Ticket Updated!');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect('/admin/tickets')->with('success', 'Ticket Deleted!');
    }
}
