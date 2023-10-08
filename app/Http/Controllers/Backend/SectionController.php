<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\SectionRequest;
use Illuminate\Support\Facades\Route;

class SectionController extends Controller
{
    public function index()
    {
        $section = Section::all();

        return response($section);
    }

    public function store(SectionRequest $request)
    {
        $path = $request->image->store('images_section', 'public');
        $section = Section::create([
            'name' => $request->name,
            'description' => $request->description,
            'message' => $request->message,
            'status' => $request->status,
            'image' => $path,
        ]);

        return response($section, 201);
    }

    public function edit(Section $section)
    {
        $section = Section::find($section);

        return response()->json($section);
    }

    public function update(SectionRequest $request, Section $section)
    {
        if (Storage::exists('public/' . $section->image)) {
            Storage::delete('public/' . $section->image);
        }
        $path = $request->image->store('images_section', 'public');

        $respones = $section->update([
            'name' => $request->name,
            'description' => $request->description,
            'message' => $request->message,
            'status' => $request->status,
            'image' => $path,
        ]);

        return response($respones, 204);
    }

    public function destroy(Section $section)
    {
        if (Storage::exists('public/' . $section->image)) {
            Storage::delete('public/' . $section->image);
        }
        $section->delete();

        return response('Deleted successfully', 200);
    }
}
