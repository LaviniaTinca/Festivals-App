<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;
use Maize\Markable\Models\Like;

class EventController extends Controller
{

    public function index()
    {
        return view('events.index', [
            'events' => Event::latest()->filter()->get(),
        ]);
    }

    public function show(Event $event)
    {
        return view('events.show', [
            'event' => $event,
            'comments' => $event->comments->sortByDesc('created_at')
        ]);
    }

    public function like(Event $event)
    {
        Like::add($event, auth()->user());
        return back()->with('success', 'Liked');
    }

    public function unlike(Event $event)
    {
        Like::remove($event, auth()->user());
        return back()->with('success', 'Unliked');
    }

    public function likedEvents()
    {
        return view('events.liked', [
            'user' => auth()->user(),
            'events' => Event::whereHasLike(
                auth()->user()
            )->get() // returns all event models with a like from the given user
        ]);
    }
}
