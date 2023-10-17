<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\MycafeRequest;
use App\Models\MyCafe;
use App\Models\Section;
use App\Traits\ImageUploadTrait;

class MycafeController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        return response()->json(
            MyCafe::with(['section:id,name'])->get());
    }

    public function store(MycafeRequest $request)
    {
        $section = Section::find($request->section_id);
        $path = $this->storeImage('image_mycafe');

        $mycafe = $section->mycafes()->create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
        ]);

        return response()->json($mycafe, 201);
    }

    public function edit(MyCafe $mycafe)
    {
        return response()->json(
            $mycafe->find($mycafe->id));
    }

    public function update(MycafeRequest $request, MyCafe $mycafe)
    {
        $this->deleteImage($mycafe);

        $path = $this->storeImage('image_mycafe');

        $mycafe->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
            'section_id' => $request->section_id,
        ]);

        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(MyCafe $mycafe)
    {
        $this->deleteImage($mycafe);

        $mycafe->delete();

        return response()->json(['message' => 'deleted successfully'], 202);
    }
}
