<?php

namespace App\Http\Controllers\Backend;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Ourrestaurant;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\OurRestaurantRequest;

class OurRestaurantController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $ourRestaurant = Ourrestaurant::with(['section:id,name'])->get();

        return response()->json($ourRestaurant);
    }

    public function store(OurRestaurantRequest $request)
    {
        $path = $this->storeImage('image_ourRestaurant');

        $section = Section::find($request->section_id);

        $ourRestaurant = $section->ourrestaurants()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

        return response()->json($ourRestaurant, 201);
    }

    public function edit(Ourrestaurant $ourRestaurant)
    {
        return response()->json($ourRestaurant->find($ourRestaurant->id));
    }

    public function update(OurRestaurantRequest $request, Ourrestaurant $ourRestaurant)
    {
        $this->deleteImage($ourRestaurant);
        $path = $this->storeImage('image_ourRestaurant');

        $ourRestaurant->update([
            'title' => $request->title,
            'description' => $request->description,
            'section_id' => $request->section_id,
            'image' => $path,
        ]);
        return response()->json(['message' => 'updated successfully']);
    }

    public function destroy(Ourrestaurant $ourRestaurant)
    {
        $this->deleteImage($ourRestaurant);
        $ourRestaurant->delete();

        return response()->json(['message' => 'deleted successfully'], 202);
    }
}
