<?php

namespace App\Http\Controllers\Backend;

use App\Models\MyCafe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\MycafeRequest;

class MycafeController extends Controller
{
    
    public function index()
    {
        $MyCafe = MyCafe::with(['section:id,name'])->get();

        return response()->json($MyCafe);
    }

    public function store(MycafeRequest $request, MyCafe $mycafe)
    {
        if ($mycafe) {
            // Delete existing images if they exist
            foreach (['image_drinks', 'image_sweets'] as $imageField) {
                $imagePath = 'public/' . $mycafe->$imageField;
                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
            }
        }

        $path_image_drinks = $request->image_drinks->store('image_drinks', 'public');
        $path_image_sweets = $request->image_sweets->store('image_sweets', 'public');
        $MyCafe = MyCafe::updateOrCreate(
            [
                'section_id' => $request->section_id,
            ],
            [
                'title_mycafe_drinks' => $request->title_mycafe_drinks,
                'description_drinks_cold' => $request->description_drinks_cold,
                'cold_drinks' => $request->cold_drinks,
                'title_mycafe_sweets' => $request->title_mycafe_sweets,
                'description_sweets' => $request->description_sweets,
                'image_drinks' => $path_image_drinks,
                'image_sweets' => $path_image_sweets,
            ],
        );

        return response()->json($MyCafe, 201);
    }
}
