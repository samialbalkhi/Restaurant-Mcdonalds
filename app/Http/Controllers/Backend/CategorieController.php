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
        return response()->json(Category::with(['section:id,name'])->paginate());
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
        return response()->json($category->find($category->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->deleteImage($category);
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
        $this->deleteImage($category);

        $category->delete();

        return response()->json(['message' => 'Deleted successfully'], 202);
    }
}
