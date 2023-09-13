<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventCommentController extends Controller
{

    public function store(Event $event)
    {

        request()->validate([
            'body' => 'required'
        ]);

        $event->comments()->create([
            'user_id' => request()->user()->id,
            'event_id' => request()->id,
            'body' => request()->body,

        ]);

        return back();
    }
}
