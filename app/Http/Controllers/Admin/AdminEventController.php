<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventCreateRequest;
use App\Http\Requests\Admin\EventForFestivalRequest;
use App\Http\Requests\Admin\EventUpdateRequest;
use App\Models\Event;
use App\Models\Festival;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{

    public function index()
    {
        return view('admin.events.index', [
            'events' => Event::paginate(7),
        ]);
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function create1(Festival $festival)
    {
        return view('admin.events.create1')->with(['festival' => $festival]);
    }

    public function store(EventCreateRequest $request)
    {
        $event = Event::create($request->except('banner_img'));
        $image = Storage::put('event_images', $request->file('banner_img'));
        $imagePath = Storage::url($image);
        $event->banner_img = $image;
        $event->save();
        return redirect('/admin/events')->with('success', 'New Event Created!');
    }

    public function store1(Festival $festival, EventForFestivalRequest $request)
    {
        $event = Event::create($request->except('banner_img'));
        $image = Storage::put('event_images', $request->file('banner_img'));
        $imagePath = Storage::url($image);
        $event->banner_img = $image;
        $event->festival_id = $festival->id;
        $event->save();

        return redirect('/admin/festivals')->with('success', 'New Event Created!');;
    }


    public function edit(Event $event)
    {
        return view('admin.events.edit', ['event' => $event]);
    }

    public function update(Event $event, EventUpdateRequest $request)
    {
        $event->update($request->except('banner_img'));
        if (isset($request['banner_img'])) {
            $image = Storage::put('event_images', $request->file('banner_img'));
            $imagePath = Storage::url($image);
            $event->banner_img = $image;

            $event->save();
        }
        return redirect('/admin/events')->with('success', 'Event Updated!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect('/admin/events')->with('success', 'Event Deleted!');
    }
}
