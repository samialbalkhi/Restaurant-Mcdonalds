<?php

namespace App\Http\Controllers\Backend;

use App\Models\MyCafe;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\MycafeRequest;

class MycafeController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $mycafe = MyCafe::with(['section:id,name'])->get();
        return response()->json($mycafe);
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
        return response()->json($mycafe->find($mycafe->id));
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
