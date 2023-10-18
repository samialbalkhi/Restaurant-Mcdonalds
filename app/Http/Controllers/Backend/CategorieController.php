<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Service\Backend\CategoryService;
use App\Http\Requests\Backend\CategoryRequest;

class CategorieController extends Controller
{
    use ImageUploadTrait;

    private $CategoryService;

    public function __construct(CategoryService $CategoryService)
    {
        $this->CategoryService = $CategoryService;
    }

    public function index()
    {
        return response()->json(
            $this->CategoryService->index());
    }

    public function store(CategoryRequest $request)
    {
         
          $category=  $this->CategoryService->store($request);
         return response()->json($category,201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return response()->json(
            $this->CategoryService->edit($category));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
            $this->CategoryService->update($request, $category);
        return response()->json(['messge' => 'Updateed successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
            $this->CategoryService->destroy($category);
        return response()->json(['message' => 'Deleted successfully'], 202);

    }
}
