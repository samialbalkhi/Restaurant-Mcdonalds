<?php
namespace App\Service\Backend;

use App\Models\Section;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\Backend\CategoryRequest;

class CategoryService
{
    use ImageUploadTrait;

    public function index()
    {
        return Category::with(['section:id,name'])->paginate();
    }

    public function store(CategoryRequest $request): Category
    {
        $section = Section::find($request->section_id);

        return $section->categories()->create(
            [
                'image' => $this->uploadImage('images_category'),
                'status' => $request->filled('status'),
            ] + $request->validated(),
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->updateImage($category);
        $category->update(
            [
                'image' => $this->uploadImage('images_category'),
                'status' => $request->filled('status'),
            ] + $request->validated(),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->deleteImage($category);
        $category->delete();
    }
}
