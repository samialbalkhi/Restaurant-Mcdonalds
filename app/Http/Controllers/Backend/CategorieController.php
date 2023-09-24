<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\User;

class CategorieController extends Controller
{
    public function index()
    {
        $Category = Category::with(['section:id,name'])->get();

        $respones = [
            'Category' => $Category,
        ];

        return response($respones, 201);
    }

    public function store(CategoryRequest $request)
    {
        $path = $request->image->store('images_Category', 'public');
        $Category = Category::create([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $path,
            'section_id'=>$request->section_id,
        ]);

        $respones = [
            'Category' => $Category,
        ];

        return response($respones, 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Category = Category::with(['section:id,name'])->findOrFail($id);
        
        $respones = [
            'Category' => $Category,
        ];

        return response($respones, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $CategoryImage = Category::get()->find($id);

        if (Storage::exists('public/' . $CategoryImage->image)) {
            Storage::delete('public/' . $CategoryImage->image);
        }
        $path = $request->image->store('images_Category' . $CategoryImage->id, 'public');

        $CategoryImage->update([
            'name' => $request->name,
            'status' => $request->status,
            'image' => $path,
            'section_id'=>$request->section_id,

        ]);

        $respones = [
            'Category' => 'Updateed Category successfully',
            'image' => $path,
        ];

        return response($respones, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $CategoryImage = Category::get()->find($id);
        if (Storage::exists('public/' . $CategoryImage->image)) {
            Storage::delete('public/' . $CategoryImage->image);
        }
        Category::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted successfully',
        ]);
    }
}
