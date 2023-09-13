<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FestivalCreateRequest;
use App\Http\Requests\Admin\FestivalUpdateRequest;
use App\Models\Event;
use App\Models\Festival;
use App\Models\Ticket;
use App\Repositories\FestivalRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminFestivalController extends Controller
{
    public $festivalRepo;

    public function __construct(FestivalRepository $festivalRepo)
    {
        $this->festivalRepo = $festivalRepo;
    }

    public function index()
    {
        //$this->festivalRepo->test();

        return view('admin.festivals.index', [
            'festivals' => Festival::paginate(7),
        ]);
    }

    public function create()
    {
        return view('admin.festivals.create');
    }


    public function store(FestivalCreateRequest $request)
    {
        $festival = Festival::create($request->except('banner_img'));
        $image = Storage::put('festival_images', $request->file('banner_img'));
        $imagePath = Storage::url($image);
        $festival->banner_img = $image;
        $festival->save();
        return redirect('/admin/festivals')->with('success', 'New Festival created!');
    }

    public function edit(Festival $festival)
    {
        return view('admin.festivals.edit', ['festival' => $festival]);
    }

    public function update(Festival $festival, FestivalUpdateRequest $request)
    {

        $festival->update($request->except('banner_img'));
        if (isset($request['banner_img'])) {
            $image = Storage::put('festival_images', $request->file('banner_img'));
            $imagePath = Storage::url($image);
            $festival->banner_img = $image;
            $festival->update();
        }
        return redirect('/admin/festivals')->with('success', 'Festival Updated!');
    }

    public function destroy(Festival $festival)
    {
        $festival->delete();
        return redirect('/admin/festivals')->with('success', 'Festival Deleted!');
    }

    public function details(Festival $festival)
    {
        return view('admin.festivals.details', [
            'events' => Event::Paginate(5),
            'tickets' => Ticket::Paginate(5),
        ])->with(['festival' => $festival]);
    }
}
