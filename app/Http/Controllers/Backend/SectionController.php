<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\SectionRequest;

class SectionController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $section = Section::all();

        return response()->json([$section]);
    }

    public function store(SectionRequest $request)
    {
        $path = $this->storeImage('images_section');

        $section = Section::create([
            'name' => $request->name,
            'description' => $request->description,
            'message' => $request->message,
            'status' => $request->status,
            'image' => $path,
        ]);

        return response()->json([$section, 201]);
    }

    public function edit(Section $section)
    {
        $section = Section::find($section);

        return response()->json([$section]);
    }

    public function update(SectionRequest $request, Section $section)
    {
        if (Storage::exists('public/' . $section->image)) {
            Storage::delete('public/' . $section->image);
        }
        $path = $this->storeImage('images_section');

        $respones = $section->update([
            'name' => $request->name,
            'description' => $request->description,
            'message' => $request->message,
            'status' => $request->status,
            'image' => $path,
        ]);

        return response()->json([$respones, 204]);
    }

    public function destroy(Section $section)
    {
        if (Storage::exists('public/' . $section->image)) {
            Storage::delete('public/' . $section->image);
        }
        $section->delete();

        return response()->json(['Deleted successfully', 200]);
    }
}
