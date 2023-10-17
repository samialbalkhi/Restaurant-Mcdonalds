<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CareerRequest;
use App\Models\Career;
use App\Models\Section;
use App\Traits\ImageUploadTrait;

class CareerController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {

        return response()->json(
            Career::with(['section:id,name'])->get());
    }

    public function store(CareerRequest $request)
    {
        $section = Section::find($request->section_id);
        $path = $this->storeImage('image_career');

        $career = $section->careers()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

        return response($career, 201);
    }

    public function edit(Career $career)
    {
        return response()->json(
            $career->find($career->id));
    }

    public function update(CareerRequest $request, Career $career)
    {
        $this->deleteImage($career);
        $path = $this->storeImage('image_career');

        $career->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);

        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(Career $career)
    {
        $this->deleteImage($career);
        $career->delete();

        return response()->json(['message' => 'deleted successfully'], 202);
    }
}
