<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class AdminEventCategoryController extends Controller
{
    public function create()
    {
        return view('admin.event_categories.create');
    }

    public function store(CategoryRequest $request)
    {
        EventCategory::create($request->all());

        return redirect('/admin/categories')->with('success', 'New Event Category Created!');;
    }

    public function edit(EventCategory $event_category)
    {
        return view('admin.event_categories.edit', ['event_category' => $event_category]);
    }

    public function update(EventCategory $event_category, CategoryRequest $request)
    {
        $event_category->update($request->all());
        return redirect('/admin/categories')->with('success', 'Event Category Updated!');
    }

    public function destroy(EventCategory $event_category)
    {
        $event_category->delete();
        return redirect('/admin/categories')->with('success', 'Event Category Deleted!');
    }
}
