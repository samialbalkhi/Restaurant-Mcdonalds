<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\CategoryRequest;

class CategorieController extends Controller
{
    public function index()
    {
        $category = Category::with(['section:id,name'])->get();

        return response($category);
    }

    public function store(CategoryRequest $request)
    {
        $section = Section::find($request->section_id);

        $path = $request->image->store('images_category', 'public');
        $category = $section->categories()->create([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $path,
        ]);

        return response($category, 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categoryWithSection = $category->load('section:id,name');

        return response()->json($categoryWithSection);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if (Storage::exists('public/' . $category->image)) {
            Storage::delete('public/' . $category->image);
        }
        $path = $request->image->store('images_category', 'public');

        $category = $category->update([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);

        return response('Updateed Category successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (Storage::exists('public/' . $category->image)) {
            Storage::delete('public/' . $category->image);
        }
        $category->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
