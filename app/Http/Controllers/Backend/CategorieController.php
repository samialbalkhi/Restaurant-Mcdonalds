<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\CategoryRequest;

class CategorieController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $category = Category::with(['section:id,name'])->get();

        return response()->json($category);
    }

    public function store(CategoryRequest $request)
    {
        $section = Section::find($request->section_id);

        $path = $this->storeImage('images_category');

        $category = $section->categories()->create([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $path,
        ]);

        return response()->json($category, 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::where('id', $category->id)->first();
        return response()->json($categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->UpdateOrDeleteImage($category);
        $path = $this->storeImage('images_category');

        $category->update([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);

        return response()->json(['messge' => 'Updateed successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->UpdateOrDeleteImage($category);

        $category->delete();

        return response()->json('Deleted successfully', 200);
    }
}
