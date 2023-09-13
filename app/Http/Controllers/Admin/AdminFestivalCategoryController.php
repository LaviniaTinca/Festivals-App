<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\FestivalCategory;
use Illuminate\Http\Request;

class AdminFestivalCategoryController extends Controller
{
    public function create()
    {
        return view('admin.festival_categories.create');
    }

    public function store(CategoryRequest $request)
    {
        FestivalCategory::create($request->all());

        return redirect('/admin/categories')->with('success', 'New Festival Category Created!');;
    }

    public function edit(FestivalCategory $festival_category)
    {
        return view('admin.festival_categories.edit', ['festival_category' => $festival_category]);
    }

    public function update(FestivalCategory $festival_category, CategoryRequest $request)
    {
        $festival_category->update($request->all());
        return redirect('/admin/categories')->with('success', 'Festival Category Updated!');
    }

    public function destroy(FestivalCategory $festival_category)
    {
        $festival_category->delete();
        return redirect('/admin/categories')->with('success', 'Festival Category Deleted!');
    }
}
