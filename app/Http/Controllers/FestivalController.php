<?php

namespace App\Http\Controllers;

use App\Exceptions\TicketsSoldOutException;
use App\Http\Requests\Auth\PurchasedTicketRequest;
use App\Models\Festival;
use App\Models\SoldTicket;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maize\Markable\Models\Like;

class FestivalController extends Controller
{
    public function index()
    {
        return view('festivals.index', [
            'festivals' => Festival::latest()->filter(
                request(['search', 'category'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function show(Festival $festival)
    {
        return view('festivals.show', [
            'festival' => $festival
        ]);
    }

    public function buy(Festival $festival)
    {
        $count = 0;
        foreach (Ticket::all() as $ticket)
            if ($ticket->festival_id === $festival->id) {
                if ($ticket->nr_of_tickets == 0) {
                    $count++;
                }
            }

        return view('festivals.buy', [
            'festival' => $festival,
            'soldTickets' => SoldTicket::all(),
        ])->with(['count' => $count]);
    }


    public function confirmation(PurchasedTicketRequest $request)
    {
        DB::beginTransaction();
        try {
            $ticket = Ticket::find($request->ticket_id);
            $ticket->nr_of_tickets--;
            $ticket->save();

            if ($ticket->nr_of_tickets === 0) {
                throw new TicketsSoldOutException('There were no remainig tickets, check back later!');
            }

            (new SoldTicket())->create([
                'user_id' => request()->user()->id,
                'ticket_id' => $ticket->id,
                'sold_at' => now(),
                'valid_till' => now()->addMonth(5)
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('success', 'Something went wrong while purchasing your ticket!');
        }

        DB::commit();
        return redirect('/')->with('success', 'Your Tickets has been purchased');
    }

    public function likef(Festival $festival)
    {
        Like::add($festival, auth()->user());
        return back()->with('success', 'Liked');
    }

    public function unlikef(Festival $festival)
    {
        Like::remove($festival, auth()->user());
        return back()->with('success', 'Unliked');
    }
}
